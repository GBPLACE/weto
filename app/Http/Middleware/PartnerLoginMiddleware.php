<?php

namespace App\Http\Middleware;

use Closure;

class PartnerLoginMiddleware
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
        if (session()->has('partner')) {
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
