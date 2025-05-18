<?php

namespace App\Http\Middleware;

use Closure;

class DainsysAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions = null)
    {
        $this->guardAgainstUnauthenticated();

        if ($request->user()->hasAnyRole(['admin', 'owner'])) {
            return $next($request);
        }

        $this->guardAgainstUnauthorizedUsers($request, $permissions);

        return $next($request);
    }

    protected function parsePermissions($permissions)
    {
        return explode('|', $permissions);
    }

    protected function guardAgainstUnauthenticated()
    {
        if (! auth()->check()) {
            abort(401, 'Unauthenticated');
        }
    }

    protected function guardAgainstUnauthorizedUsers($request, $permissions)
    {
        if (! $request->user()->hasAnyPermission(
            $this->parsePermissions($permissions)
        )) {
            // session()->flash('danger', 'Unauthorized! Permissions Needed: ' . $permissions);

            abort(403, "You need permission {$permissions} to view this page!");
        }
    }
}
