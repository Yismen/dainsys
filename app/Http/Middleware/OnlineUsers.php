<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class OnlineUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            Cache::put('online-user-'.auth()->user()->id, true, now()->addMinutes(10));
        }

        return $next($request);
    }
}
