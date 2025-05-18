<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUsersHaveProfile
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
        $user = auth()->user();
        if ($user && ! $user->profile) {
            // return redirect()->route('admin.profiles.create');
            $user->profile()->create(['gender' => 'male']);

        }
        return $next($request);
    }
}
