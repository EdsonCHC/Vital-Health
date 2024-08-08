<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class doctor
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('doctor')->check()) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Acceso denegado');
    }
}