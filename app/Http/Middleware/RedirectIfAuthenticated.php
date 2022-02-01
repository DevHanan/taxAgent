<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->guard($guard)->check()) {
            if($guard == "client"){
                //user was authenticated with client guard.
                return redirect('/login/client');
            } else {
                //default guard.
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
