<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // 1) If not logged in, send to login
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // 2) If role isn’t exactly 'admin', abort
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Not Sure What You Are Doing Here ??');
        }

        // 3) Otherwise, continue
        return $next($request);
    }
}
