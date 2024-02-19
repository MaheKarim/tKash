<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAgent
{

    public function handle($request, Closure $next, $guard = 'agent')
    {
        if (Auth::guard($guard)->check()) {
            return to_route('agent.dashboard');
        }
        return $next($request);
    }
}
