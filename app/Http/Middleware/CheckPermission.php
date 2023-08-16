<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    use Illuminate\Support\Facades\Gate;

public function handle($request, Closure $next, $permission)
{
    if (!Gate::allows($permission)) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
}
}
