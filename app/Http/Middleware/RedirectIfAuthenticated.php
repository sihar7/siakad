<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::guard($guard)->check()) {
            if (Auth()->user()->role == 'admin' || Auth()->user()->role == 'petugas') {
                return redirect('/dashboard');
            } else if (Auth()->user()->role == 'siswa') {
                return redirect('/student/dashboard');
            } else {
                return redirect('/teacher/dashboard');
            }
            // return redirect('/dashboard');
        }

        return $next($request);
    }
}
