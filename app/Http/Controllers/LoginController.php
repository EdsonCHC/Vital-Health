<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Usuario;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show(Request $request)
    {
        $credentials = $request->only('mail', 'password');

        try {
            // Intentar autenticar como usuario normal
            $user = Usuario::where('mail', $credentials['mail'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                if (is_null($user->email_verified_at)) {
                    // Cierra la sesión y redirige con un mensaje de error
                    Auth::logout();
                    return response()->json(['success' => false, 'message' => 'Debes verificar tu correo electrónico para acceder.'], 400);
                }

                Auth::login($user);
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/user'], 200);
            }

            $doctor = Doctor::where('mail', $credentials['mail'])->first();

            if ($doctor && Hash::check($credentials['password'], $doctor->password)) {
                Auth::guard('doctor')->login($doctor);
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/doctor'], 200);
            }

            // Intentar autenticar como administrador
            $admin = Admin::where('mail', $credentials['mail'])->first();

            if ($admin && Hash::check($credentials['password'], $admin->password)) {
                Auth::guard('admin')->login($admin);
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/home'], 200);
            }

            $laboratorio = Laboratorio::where('mail', $credentials['mail'])->first();

            if ($laboratorio && Hash::check($credentials['password'], $laboratorio->password)) {
                Auth::guard('laboratorio')->login($laboratorio);
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/index_lab'], 200);
            }

            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => "Error: " . $e->getMessage()], 500);
        }
    }
}
