<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Doctor;
use App\Models\Categoría;
use App\Models\Receta;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Expedientes;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexu()
    {
        $categorias = Categoría::where('activa', 1)->get();
        return view('app.area', compact('categorias'));
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $citas = Citas::with('category')
            ->where('patient_id', $userId)
            ->where('state', 0)
            ->get();

        $exams = Exams::where('patient_id', $userId)
            ->where('state', 0)
            ->get();

        $recetas = Receta::with('medicinas')
        ->where('patient_id', $userId)
            ->get();

        $expedientes = Expedientes::where('patient_id', $userId)->get();

        return view('app.user_info', compact('user', 'citas', 'exams', 'recetas', 'expedientes'));
    }

    public function citasPaciente(Request $request)
    {
        $pacienteId = Auth::id();

        $citas = Citas::with('category', 'doctor')
            ->where('patient_id', $pacienteId)
            ->where('state', 1)
            ->whereNotNull('doctor_id')
            ->get();

        return view('app.user_info', compact('user'));
    }

    public function showDoctors()
    {
        $doctors = Doctor::with('category')->get();
        return view('app.index', compact('doctors'));
    }

    public function store(Request $request)
    {
        // Validar datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'mail' => 'required|email|unique:patients,mail',
            'address' => 'required|max:255',
            'gender' => 'required',
            'birth' => 'required|date',
            'blood' => 'required',
            'password' => 'required|min:8',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if ($request->hasFile('img') && $request->file('img')->getSize() === 0) {
            return response()->json([
                'message' => 'El archivo de imagen no puede estar vacío.',
            ], 422);
        }

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        $imageData = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageData = file_get_contents($image->getRealPath()); // Leer datos binarios de la imagen
            // Almacena la imagen en formato binario
        }


        // Crear usuario
        try {
            $user = Usuario::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'mail' => $request->mail,
                'address' => $request->address,
                'gender' => $request->gender,
                'birth' => $request->birth,
                'blood' => $request->blood,
                'password' => Hash::make($request->password),
                'img' => $imageData,
                'email_verification_token' => Str::random(60),
            ]);

            if (!$user) {
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }

            // Crear expediente relacionado al usuario (paciente)
            $expediente = Expedientes::create([
                'patient_id' => $user->id, // Relaciona el expediente con el paciente
            ]);

            if (!$expediente) {
                DB::rollBack(); // Revertir transacción en caso de fallo
                return response()->json([
                    'message' => 'Error al crear el expediente',
                ], 500);
            }

            DB::commit(); // Confirmar la transacción si todo sale bien

            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => $user->id, 'token' => $user->email_verification_token]
            );

            Mail::to($user->mail)->send(new VerifyEmail($user, $verificationUrl));

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'mail' => 'required|email|max:255',
                'address' => 'required|string|max:255',
            ]);

            $user = Auth::user();
            $user->update($request->only([
                'mail',
                'address'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Perfil actualizado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            // Validar la solicitud
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            $user = Auth::user();

            // Verificar si la contraseña actual es correcta
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'La contraseña actual no es correcta.'
                ], 400);
            }

            // Actualizar la contraseña
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Contraseña actualizada correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function updateImage(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $user = Auth::user();

        $imageData = null;
        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $imageData = file_get_contents($image->getRealPath());

            // Actualizar la ruta de la imagen en el perfil del usuario
            $user->img = $imageData;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Imagen actualizada correctamente',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'No se ha proporcionado ninguna imagen'
        ], 400);
    }

    public function showImage($id)
    {
        $patient = Usuario::find($id);

        if (!$patient) {
            abort(404, 'Paciente no encontrado');
        }

        $imageData = $patient->img;

        if ($imageData) {
            return response($imageData, 200)
                ->header('Content-Type', 'image/jpeg');
        } else {
            abort(404, 'Imagen no encontrada');
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        }

        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function showRegistrationConfirmation()
    {
        $user = auth()->user();
        return view('emails.verify-confirm', compact('user'));
    }

    public function showVerificationSuccess()
    {
        $user = auth()->user();
        return view('emails.verify-confirmed', compact('user'));
    }
}
