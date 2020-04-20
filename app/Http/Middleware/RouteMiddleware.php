<?php

namespace App\Http\Middleware;

use Closure;

class RouteMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!session('deposit')) {
			// abort(401, __("No puedes acceder a esta zona"));
			return back();
		}
		return $next($request);
	}
}
