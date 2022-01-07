<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        if (!auth()->check()) {
            abort(403);
        }

        if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Kasir' || auth()->user()->role === 'Apoteker' || auth()->user()->role === 'Dokter') {

            return $next($request);
        } else {
            abort(403);
        }
    }
}
