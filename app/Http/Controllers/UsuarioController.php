<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Categoría;
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
    
    public function index()
    {
        $user = Auth::user(); // Obtiene al usuario autenticado
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
            'mail' => 'required|email|unique:patients', // Cambiado a 'patients'
            'gender' => 'required',
            'birth' => 'required|date',
            'blood' => 'required',
            'password' => 'required|min:8',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar imagen
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Subir la imagen si se proporciona
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

            // Autenticar y redirigir al usuario
            Auth::login($user);

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente',
                'redirect_url' => '/user',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
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

            // Intentar autenticar como doctor
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

            // Si no se encontraron credenciales válidas
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => "Error: " . $e->getMessage()], 500);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'birth' => 'required|date',
                'mail' => 'required|email|max:255',
                'blood' => 'nullable|string|max:255',
            ]);

            $user = Auth::user();
            $user->update($request->only([
                'name',
                'lastName',
                'gender',
                'birth',
                'mail',
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
