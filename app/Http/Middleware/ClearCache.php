<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Artisan;

class ClearCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        return $next($request);
    }
}
