<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\Guard;
use Symfony\Component\HttpFoundation\Response;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('web')->check()) {
            if (auth()->guard('web')->user()->role == 'user') {
                return $next($request);
            }
        }
        return redirect()->route('login');
    }
}
