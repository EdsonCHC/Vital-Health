<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'lastName' => 'required',
            'mail' => 'required|email',
            'gender' => 'required',
            'birth' => 'required',
            'blood'=> 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Datos inválidos',
                'errors'=> $validator->errors(),
                'status'=> 200
            ];
            return response()->json($data, 500);
        }

        try{
            $user = Usuario::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'mail' => $request->mail,
                'gender' => $request->gender,
                'birth' => $request->birth,
                'blood'=> $request->blood,
                'password' => $request->password
            ]);
            
            if(!$user){
                $data = [
                    'message' => 'No se pudo crear el usuario',
                    'status'=> 200
                ];
                return response()->json($data, 500);
            }

            $data = [
                'message' => 'Usuario creado correctamente',
                'status'=> 200
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json("DIANTRES: ". $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
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
    public function destroy(Usuario $usuario)
    {
        //
    }
}
