<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class user
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Verifica si el usuario tiene el rol 'user' y si ha verificado su correo electrónico
            if ($user->role === 'user' && !$user->hasVerifiedEmail()) {
                // Redirige al usuario a la página de verificación
                return redirect()->route('verify.confirm');
            }

            return $next($request);
        }

        // Si el usuario no está autenticado, redirige a la página de inicio de sesión
        return redirect('/login')->with('error', 'Acceso denegado');
    }
}


