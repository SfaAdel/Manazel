<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Add your logic here
        // For example, you could check if the user has a specific role or permission

        return $next($request);
    }
}

