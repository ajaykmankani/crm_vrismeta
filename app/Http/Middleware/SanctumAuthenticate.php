<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SanctumAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        $allowedUrls = [
            'http://localhost:8000',
            'http://localhost/manisha_api/'

        ];

        if (!Str::startsWith($request->url(), $allowedUrls)) {
            return abort(401);
        }

        // if (!Auth::guard('sanctum')->check()) {
        //     return response()->json(['message' => 'Unauthorized.'], 401);
        // }

        return $next($request);
    }
}
