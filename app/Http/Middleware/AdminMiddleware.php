<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        abort_unless(auth()->check(), 401, 'Unauthenticated');

        abort_if($request->user()->hasAnyRole(['admin', 'Admin']) === false, 403, 'Forbidden');

        return $next($request);
    }
}
