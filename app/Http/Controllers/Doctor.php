<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Doctor extends Controller
{
    public function destroy(Request $request)
    {
        // Cerrar sesión del doctor
        Auth::guard('doctor')->logout();

        // Invalidar la sesión y regenerar el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir a la página de inicio de sesión
        return response()->json(['success' => true, 'url' => '/login'], 200);
    }
}
