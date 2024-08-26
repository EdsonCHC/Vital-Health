<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\Usuario;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $token)
    {
        $user = Usuario::findOrFail($id);

        if (URL::hasValidSignature($request)) {
            if ($user->email_verification_token === $token) {
                // Verifica el correo
                $user->email_verified_at = now();
                $user->email_verification_token = null; // Limpia el token después de verificar
                $user->save();

                return redirect()->route('verify.confirmed');
            } else {
                return response()->json(['message' => 'Token de verificación inválido.'], 400);
            }
        } else {
            return response()->json(['message' => 'El enlace ha expirado o es inválido.'], 400);
        }

    }

}
