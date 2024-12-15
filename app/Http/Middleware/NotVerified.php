<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('user');
        } else {
            return $next($request);
        }
    }
}
