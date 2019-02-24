<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class frontLogin
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
        if (empty(Session::has('frontSession'))) {
            return redirect('/user/login') -> with('flash_message_error', 'Please login first');
        }
        return $next($request);
    }
}
