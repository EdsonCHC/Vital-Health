<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorio;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;

class LaboratorioController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('laboratorio.home', compact('medicines'));

    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo medicamento
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'batch_number' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'description' => 'nullable|string',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $medicine = Medicine::create($validatedData);

        return response()->json([
            'message' => 'Medicina registrada correctamente',
            'medicine' => $medicine,
        ], 201);
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicines.show', compact('medicine'));
    }

    public function edit($id)
    {
        // Mostrar el formulario para editar un medicamento
    }

    public function update(Request $request, $id)
    {
        // Validar y actualizar un medicamento existente
    }

    public function destroy(Request $request)
    {
        Auth::guard('laboratorio')->logout();

        try {
            // Invalidate the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Respond with the success message and URL
            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
