<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use function auth;
use function compact;
use function now;
use function response;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    private function validateUserInfo(Request $request): array|JsonResponse
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'sometimes|filled|string|email|max:255|unique:users',
            'phone' => 'sometimes|filled|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validated->fails()) {
            $response = response()->json([
                                             'status' => 'error',
                                             'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                                             'message' => $validated->errors()->messages(),
                                         ], Response::HTTP_UNPROCESSABLE_ENTITY);

            throw new HttpResponseException($response);
        }

        return $validated->validated();
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'phone', 'password']);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'ایمیل یا رمزعبور اشتباه میباشد.'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'ورود ناموفق بود!'], 500);
        }

        return response()->json(compact('token'));
    }

    /**
     * Register a User via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $user = User::create($this->validateUserInfo($request));

        $token = JWTAuth::fromUser($user);

        return response()->json(
            [
                'user' => UserResource::make($user),
                'token' => $token,
            ], 201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): JsonResponse
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], Response::HTTP_UNAUTHORIZED);
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            return response()->json(['token_absent'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['user' => UserResource::make($user)]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function logout(): JsonResponse
    {
        auth('api')->logout();

        return response()->json(['message' => 'خروج موفق آمیز بود.']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string  $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected
    function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
                                    'access_token' => $token,
                                    'token_type' => 'bearer',
                                    'expires_in' => auth('api')->factory()->getTTL() * 60,
                                ]);
    }

    public function updateProfile(Request $request): JsonResponse
    {
        return response()->json(
            [
                'message' => auth('api')
                    ->user()
                    ?->update($this->validateUserInfo($request)) > 0 ? '.پروفایل ویرایش شد' : '!ویرایش پروفایل ناموفق بود',
            ]);
    }

    public function profilePasswordUpdate(Request $request): JsonResponse
    {
        return response()->json(
            [
                'message' => auth('api')
                    ->user()
                    ?->update(['password' => $request->input('password')]) > 0 ? 'رمزعبور ویرایش شد.' : 'ویرایش رمزعبور ناموفق بود',
            ]);
    }

    public function profilePhoneVerified(): bool
    {
        return auth('api')->user()->hasVerifiedPhone();
    }

    public function profilePhoneVerifiedUpdate(): JsonResponse
    {
        return auth('api')->user()?->update(
            [
                'phone_verified_at' => now(),
            ]) > 0 ? response()->json(['message' => 'شماره تماس شما تایید شد.']) : response()->json(['message' => 'تایید شماره تماس شما ناموفق بود!']);
    }
}
