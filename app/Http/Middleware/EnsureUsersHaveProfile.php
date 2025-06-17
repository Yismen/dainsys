<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUsersHaveProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app()->isProduction()) {
            $user = auth()->user();
            if ($user && ! $user->profile) {
                $user->profile()->create(['gender' => 'male']);

            }
        }

        return $next($request);
    }
}
