<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use function to_route;

class EnsurePhoneVerifiedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user() || ! $request->user()->hasVerifiedPhone()) {
            return to_route('phone.unverified');
        }

        return $next($request);
    }
}
