<?php

namespace App\Http\Controllers;

use App\Models\HeartRate;
use Illuminate\Http\Request;

class heart_rate extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'rate' => 'required|integer',
        ]);

        HeartRate::create([
            'patient_id' => $validatedData['patient_id'],
            'rate' => $validatedData['rate'],
        ]);

        return response()->json(['message' => 'Heart rate saved successfully'], 200);
    }
}
