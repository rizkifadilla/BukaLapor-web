<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CekRole
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
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Instance') {
            return $next($request);
        } elseif (Auth::user()->role == 'User') {
            return redirect('user/report-form');
        }

        return $next($request);
    }
}
