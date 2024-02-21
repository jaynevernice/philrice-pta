<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check())) {
            if(Auth::user()->user_type == 'super_admin') {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('login');
            }
        } else {
            Auth::logout();
            // return redirect(url(''));
            return redirect('login');
        }
    }
}
