<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsClient
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
        if (Auth::user() &&  Auth::user()->role_id == 2) {
            if(Auth::user()->status_id == 2){
                return redirect('backroom/login')->with('Your account is not approved yet.');
            }
            return $next($request);
        }
        return redirect('backroom/login');
    }
}
