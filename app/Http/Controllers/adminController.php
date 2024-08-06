<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function destroy(Request $request)
    {
        // Verifica que el usuario esté autenticado como admin
        if (Auth::guard('admin')->check()) {
            // Cerrar sesión del administrador
            Auth::guard('admin')->logout();

            try {
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return response()->json(['success' => true, 'url' => '/'], 200);
            } catch (\Exception $e) {
                return response()->json(['success' => false], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'No estás autenticado'], 401);
    }
}
