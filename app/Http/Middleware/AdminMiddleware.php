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
        if (! auth()->check()) {
            abort(401, 'Unauthenticated');
        }

        if ($request->user()->hasAnyRole(['admin', 'Admin']) === false) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
