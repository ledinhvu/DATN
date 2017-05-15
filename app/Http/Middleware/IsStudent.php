<?php namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\RedirectResponse;
class IsStudent {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->session ()->has ( 'users' )) {
			return $next($request);
		} else {
			return new RedirectResponse(url('/login1'));
		}
	}
}