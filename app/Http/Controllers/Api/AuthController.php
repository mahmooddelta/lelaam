<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use function compact;

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

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
                                 'name' => $request->get('name'),
                                 'email' => $request->get('email'),
                                 'password' => Hash::make($request->get('password')),
                             ]);

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
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function logout(): JsonResponse
    {
        auth()->logout();

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
}
