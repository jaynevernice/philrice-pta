<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;

class ViewerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check())) {
            if(Auth::user()->user_type == 'viewer') {
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
