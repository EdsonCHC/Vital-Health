<?php

namespace App\Http\Controllers;

use App\Models\Citas;
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
            'description' => 'nullable|string' // Se permite que la descripción sea opcional
        ]);

        try {
            $appointment = Citas::create([
                'date' => $validatedData['date'],
                'hour' => $validatedData['hour'],
                'modo' => $validatedData['modalidad'], // Asegúrate de que este campo coincide con el nombre del campo en la base de datos
                'description' => $validatedData['description'] ?? '', // Si la descripción no está presente, se establece como cadena vacía
                'id_patient' => Auth::id(),
                'state' => 1, // Estado inicial 'inicio'
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
