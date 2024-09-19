<?php

namespace App\Http\Controllers;

use App\Models\DatoSensor;
use Illuminate\Http\Request;

class DatoSensorController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'temperatura' => 'required|numeric',
            'pulso' => 'required|integer',
        ]);

        // Crear un nuevo registro en la base de datos
        $sensor = DatoSensor::create([
            'temperatura' => $validatedData['temperatura'],
            'pulso' => $validatedData['pulso'],
        ]);

        // Retornar respuesta
        return response()->json([
            'message' => 'Datos almacenados correctamente',
            'data' => $sensor
        ], 201);
    }
}
