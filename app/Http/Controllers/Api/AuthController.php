<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
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
            'phone' => 'sometimes|filled|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'state_id' => 'sometimes|filled|integer|min:0|exists:states,id',
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
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $user = User::create(
            [
                'name' => $this->validateUserInfo($request)['name'],
                'email' => $this->validateUserInfo($request)['email'] ?? null,
                'phone' => $this->validateUserInfo($request)['phone'],
                'password' => Hash::make($this->validateUserInfo($request)['password']),
                'state_id' => $this->validateUserInfo($request)['state_id'] ?? null,
            ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(
            [
                'user' => UserResource::make($user),
                'token' => $token,
            ], ResponseAlias::HTTP_CREATED);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): JsonResponse
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['!مشخصات وارد شده، درست نیست'], Response::HTTP_NOT_FOUND);
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
        auth('api')->invalidate(true);

        auth('api')->logout(true);

        return response()->json(['message' => '.خروج موفق آمیز بود']);
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
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'sometimes',
                'filled',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignoreModel(auth()->user()),
            ],
            'phone' => [
                'sometimes',
                'filled',
                'string',
                'max:255',
                Rule::unique('users')->ignoreModel(auth()->user()),
            ],
            'password' => 'required|string|min:8|confirmed',
            'state_id' => 'sometimes|filled|integer|min:0|exists:states,id',
        ]);
        if ($validated->fails()) {
            $response = response()->json([
                'status' => 'error',
                'message' => $validated->errors()->messages(),
            ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);

            throw new HttpResponseException($response);
        }

        $validated = $validated->validated();

        return response()->json(
            [
                'message' => auth('api')
                    ->user()
                    ?->update([
                        'name' => $validated['name'],
                        'email' => $validated['email'] ?? null,
                        'phone' => $validated['phone'],
                        'password' => Hash::make($validated['password']),
                        'state_id' => $validated['state_id'] ?? null,
                    ]) > 0 ? '.پروفایل ویرایش شد' : '!ویرایش پروفایل ناموفق بود',
            ], ResponseAlias::HTTP_CREATED);
    }

    public function profilePasswordUpdate(Request $request): JsonResponse
    {
        return response()->json(
            [
                'message' => auth('api')
                    ->user()
                    ?->update(['password' => Hash::make($request->input('password'))]) > 0 ? 'رمزعبور ویرایش شد.' : 'ویرایش رمزعبور ناموفق بود',
            ], ResponseAlias::HTTP_CREATED);
    }

    public function profilePhoneVerified(): bool
    {
        return auth('api')->user()->hasVerifiedPhone();
    }

    public function profilePhoneVerifiedUpdate(Request $request): JsonResponse
    {
        $validated = $request->validate(
            [
                'phone' => 'required|filled|min:9|max:14|exists:users,phone|unique:users,phone',
            ]);
        if (auth('api')->user()->hasVerifiedPhone()) {
            return response()->json(['message' => '!شماره تماس کاربر از قبل تایید شده است'], Response::HTTP_FORBIDDEN);
        }

        if (auth('api')->user()->phone !== $validated['phone']) {
            return response()->json(['message' => '!شماره تماس وارد شده، اشتباه است'], Response::HTTP_UNAUTHORIZED);
        }

        return auth('api')->user()?->update(
            [
                'phone_verified_at' => now(),
            ]) > 0 ? response()->json(['message' => '.شماره تماس شما تایید شد']) : response()->json(['message' => '!تایید شماره تماس شما ناموفق بود']);
    }
}
