<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Response;

class TeacherMiddleware
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
         if (Auth::check() && Auth::user()->userable_type == 'Teacher') {
             return $next($request);
         }
         elseif (Auth::check() && Auth::user()->userable_type == 'Student') {
             return redirect('/student/dashboard');
         }
         else {
             return redirect('/admin/dashboard');
         }
}
}
