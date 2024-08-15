<?php

namespace App\Http\Controllers;

use App\Models\citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'hour' => 'required|string',
            'modalidad' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categorias,id', // Asegúrate de que la categoría existe
        ]);

        try {
            $appointment = Citas::create([
                'date' => $validatedData['date'],
                'hour' => $validatedData['hour'],
                'modo' => $validatedData['modalidad'], 
                'description' => $validatedData['description'] ?? '',
                'id_patient' => Auth::id(),
                'id_category' => $validatedData['category_id'], // Agrega el ID de la categoría
                'state' => 1, 
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cita creada exitosamente',
                'appointment' => $appointment,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
