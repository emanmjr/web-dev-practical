<?php

namespace App\Http\Middleware;

use Closure;

class UserCanAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Admin Role
        if (auth()->user()->userRole->id != 1){ 
            return back();
        }
        return $next($request);
    }
}
