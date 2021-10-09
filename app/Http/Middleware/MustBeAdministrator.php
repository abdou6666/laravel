<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeAdministrator
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
        //ddd(auth()->user()->username);
        if (auth()->user()?->username !== 'abdousfayhi') {
            abort(403);
        }
        return $next($request);
    }
}
