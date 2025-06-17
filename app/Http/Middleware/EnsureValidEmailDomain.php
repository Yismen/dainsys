<?php

namespace App\Http\Middleware;

use Closure;

class EnsureValidEmailDomain
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
        if(app()->isProduction()){
            $domains = config('app.valid_email_domains');
            $valid_domains = [];
            $user_domain = explode("@", (string) auth()->user()->email, 2)[1];
            
            if(is_array($domains) == false)
            {
                $domains = preg_split("/[\,\|;]+/", (string) $domains, -1, PREG_SPLIT_NO_EMPTY);
            }
            
            foreach ($domains as $domain) {
                $valid_domains[] = trim((string) $domain);;
            }
            
            abort_if(in_array($user_domain, $valid_domains) == false, 403, "Email domain {$user_domain} not accepted");
        }

        return $next($request);
    }
}
