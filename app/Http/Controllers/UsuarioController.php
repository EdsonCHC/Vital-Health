<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('app.user_info', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
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
            'password' => 'required|min:3',
        ]);

        // Si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
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
                'password' => Hash::make($request->password), // Cifrado de contraseña
            ]);

            if (!$user) {
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }

            // Autenticar al usuario después de crearlo
            Auth::login($user);

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente',
                'redirect_url' => '/user',
            ], 201); // 201 Created
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
            "mail" => $request->mail,
            "password" => $request->password
        ];

        try {
            // Intentar autenticar como usuario normal
            $user = Usuario::where('mail', $credentials['mail'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/user'], 200);
            }

            // Intentar autenticar como administrador
            $admin = Admin::where('mail', $credentials['mail'])->first();

            if ($admin && Hash::check($credentials['password'], $admin->password)) {
                Auth::guard('admin')->login($admin);
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/statistics'], 200);

            }

            // Si no se encontraron credenciales válidas
            return response()->json(['message' => 'Credenciales incorrectas'], 401);

        } catch (\Exception $e) {
            return response()->json("Error: " . $e->getMessage(), 500);
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
    public function update(Request $request)
    {
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
            'name', 'lastName', 'gender', 'birth', 'mail', 'blood'
        ]));
    
        return response()->json([
            'success' => true,
            'message' => 'Perfil actualizado correctamente'
        ], 200);
    }
    
    

    public function destroy(Request $request)
    {
        //log out

        Auth::logout();

        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
