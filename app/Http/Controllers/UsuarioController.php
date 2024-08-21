<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Laboratorio;
use App\Models\Categoría;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Receta;
use App\Models\Exams;
use App\Models\citas;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexu()
    {
        $categorias = Categoría::all();
        return view('app.area', compact('categorias'));
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $citas = Citas::with('category')
        ->where('patient_id', $userId)
            ->where('state', 1)
            ->get();

        $exams = Exams::where('patient_id', $userId)
            ->where('state', 1)
            ->get();

        $recetas = Receta::with('medicinas')
        ->where('patient_id', $userId)
            ->get();

        return view('app.user_info', compact('user', 'citas', 'exams', 'recetas'));
    }

    public function generatePdf()
    {
        try {
            $user = Auth::user();
            $userId = $user->id;

            $citas = Citas::with('category')
            ->where('patient_id', $userId)
                ->where('state', 1)
                ->get();

            $exams = Exams::where('patient_id', $userId)
                ->where('state', 1)
                ->get();

            $recetas = Receta::with('medicinas')
            ->where('patient_id', $userId)
                ->get();

            $pdf = Pdf::loadView('pdf.expediente', compact('user', 'citas', 'exams', 'recetas'));
            return $pdf->download('expediente.pdf');
        } catch (\Throwable $th) {
            // Registrar el error
            Log::error('Error al generar el PDF: ' . $th->getMessage());
            // Devolver una respuesta con el mensaje de error
            return response()->json([
                'success' => false,
                'message' => 'No se pudo generar el PDF. Por favor, inténtelo de nuevo más tarde.'
            ], 500);
        }
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
            'mail' => 'required|email|unique:patients',
            'address' => 'required|max:255',
            'gender' => 'required',
            'birth' => 'required|date',
            'blood' => 'required',
            'password' => 'required|min:8',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('profile_images', 'public');
        } else {
            $imagePath = null;
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
                'img' => $imagePath,
            ]);

            if (!$user) {
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }

            Auth::login($user);

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

    public function show(Request $request)
    {
        $credentials = [
            'mail' => $request->mail,
            'password' => $request->password,
        ];

        try {
            // Intentar autenticar como usuario normal
            $user = Usuario::where('mail', $credentials['mail'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
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

    public function edit(Usuario $usuario)
    {
        //
    }

    public function update(Request $request, Usuario $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'gender' => 'required|string|max:50',
                'birth' => 'required|date',
                'mail' => 'required|email|max:255',
                'address' => 'required|string|max:255',
            ]);

            $user = Auth::user();
            $user->update($request->only([
                'name',
                'lastName',
                'gender',
                'birth',
                'mail',
                'address',
                'blood'
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

    public function destroy(Request $request)
    {
        if (Auth::check()) {
            // Cerrar sesión
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
}
