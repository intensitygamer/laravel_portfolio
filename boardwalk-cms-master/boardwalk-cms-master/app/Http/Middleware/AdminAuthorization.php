<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthorization
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
		if ( !array_key_exists( "admin", session()->all() )) {
			return redirect()->route('403');
		}
		return $next($request);
	}
}
