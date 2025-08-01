<?php

namespace App\Http\Middleware;

use Closure;

class EnsureValidEmailDomain
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
            if (auth()->check() === false) {
                abort(401, 'Unauthenticated');
            }

            $accepted_domains = config('app.valid_email_domains');

            if (is_array($accepted_domains) == false) {
                $accepted_domains = preg_split("/[\,\|;]+/", (string) $accepted_domains, -1, PREG_SPLIT_NO_EMPTY);
            }

            $user_domain = explode('@', (string) auth()->user()->email, 2)[1];

            if (is_null($accepted_domains) || empty($accepted_domains)) {
                abort(403, 'No valid email domains configured');
            }

            abort_if(in_array($user_domain, $accepted_domains) == false, 403, "Email domain {$user_domain} not accepted");
        }

        return $next($request);
    }
}
