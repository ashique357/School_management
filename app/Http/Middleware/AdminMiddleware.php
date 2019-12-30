<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


function handle($request, Closure $next)
{
    if (Auth::check() && Auth::user()->userable_type == 'Admin') {
        return $next($request);
    }
    elseif (Auth::check() && Auth::user()->userable_type == 'Student') {
        return redirect('/student/dashboard');
    }
    else {
        return redirect('/teacher/dashboard');
    }
}
}
