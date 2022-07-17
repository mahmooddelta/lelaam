<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function auth;
use function response;
use function route;

class EnsureAPIUserVerifiedPhoneMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('api')->check() &&
            (! auth('api')->user() || ! auth('api')->user()->hasVerifiedPhone())) {
            return response()->json([
                'status' => 'phone_not_verified',
                'message' => '.کاربر گرامی! شماره تماس شما در سیستم تایید نشده است',
                'web_route' => route('phone.verify'),
            ], ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
