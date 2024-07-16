<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemperatureRate;

class temperature_model extends Controller
{
    public function storeTemperature(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'temperature' => 'required|numeric',
        ]);

        TemperatureRate::create([
            'patient_id' => $validatedData['patient_id'],
            'temperature' => $validatedData['temperature'],
        ]);

        return response()->json(['message' => 'Temperature saved successfully'], 200);
    }
}
