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
        if (!auth()->check() || auth()->user()->role !== 'Admin' || auth()->user()->role !== 'Dokter' || auth()->user()->role !== 'Apoteker' || auth()->user()->role !== 'Kasir') {
            abort(403);
        }

        return $next($request);
    }
}
