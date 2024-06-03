<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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
        return view('app.user_info', ['user'=> $user]);
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

        // Suggested code may be subject to a license. Learn more: ~LicenseLog:3684436668.

        //validar datos
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'lastName' => 'required|max:255',
                'mail' => 'required|email|unique:usuarios',
                'gender' => 'required',
                'birth' => 'required',
                'blood' => 'required',
                'password' => 'required|min:3'
            ]
        );

        //si la validación falla
        if ($validator->fails()) {
            $data = [
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
                'status' => 200
            ];
            return response()->json($data, 500);
        }

        //si la validación es correcta
        try {
            $user = Usuario::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'mail' => $request->mail,
                'gender' => $request->gender,
                'birth' => $request->birth,
                'blood' => $request->blood,
                'password' => Hash::make($request->password) //cifrado de contraseña
            ]);

            if (!$user) {
                $data = [
                    'message' => 'failed',
                    'status' => 200
                ];
                return response()->json($data, 500);
            }

            $data = [
                'success' => true,
                'status' => 200,
                'redirect_url' => '/user'
            ];
            Auth::login($user);
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json("DIANTRES: " . $e->getMessage(), 500);
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
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return response()->json(['success' => true, 'redirect_url' => '/user'], 200);
            } else {
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
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
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //log out

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
