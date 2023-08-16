<?php

namespace App\Http\Middleware;
use Closure;
use JWTAuth;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $role = explode('/', $request->route()->uri)[1];

        if (!$user || !$user->hasAnyRole($user->id, $role)) {
            return response()->json(['message' => "Unauthorized"], 403);
        }

        return $next($request);
    }
}




