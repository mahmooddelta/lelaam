<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\BaseMiddleware;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function response;

class JWT extends BaseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => '!توکن ورود درست نیست'], ResponseAlias::HTTP_UNAUTHORIZED);
            }

            if ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 'توکن منقضی شده است!'], ResponseAlias::HTTP_UNAUTHORIZED);
            }

            return response()->json(['status' => '!توکن ورود درست نیست'], ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
