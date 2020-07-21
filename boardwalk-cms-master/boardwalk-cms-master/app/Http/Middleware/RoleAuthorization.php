<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\View;
use Closure;

class RoleAuthorization
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
				// Check if its login path so that we can just let it pass
				// TODO
				// Check also if its authenticated so that we can redirect to home
				if ( $request->path() == 'login' ) {
					return $next($request);
				}

				$session = session()->all();
				// Else assume all routes are authenticated so check for role
				// Only merchant and admin is allowed
				if ( array_key_exists( "admin", $session ) && $session['admin']) {
					View::share('name', $session['first_name'] . ' ' . $session['last_name']);
					View::share('admin', true);
					return $next($request);
				}

				if ( array_key_exists( "merchant", $session )) {
					View::share('name', $session['first_name'] . ' ' . $session['last_name']);
					View::share('admin', false);
					return $next($request);
				}

				session()->flush();
				return redirect()->route('login');
    }
}
