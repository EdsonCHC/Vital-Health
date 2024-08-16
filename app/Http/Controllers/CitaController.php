<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\Categoría;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function index()
    {
        $citas = citas::all();
        return view('doctor.citas_doc', compact('citas'));
    }
    public function showAppointments($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }
        $citas = Citas::where('category_id', $id)->get();
        return view('admin.appointment', compact('categoria', 'citas'));
    }
    
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'hour' => 'required|string',
        'modalidad' => 'required|string',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categorias,id',
    ]);

    try {
        $appointment = Citas::create([
            'date' => $validatedData['date'],
            'hour' => $validatedData['hour'],
            'modo' => $validatedData['modalidad'],
            'description' => $validatedData['description'] ?? '',
            'patient_id' => Auth::id(),
            'category_id' => $validatedData['category_id'],
            'state' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cita creada exitosamente',
            'appointment' => $appointment,
        ], 201);
    } catch (\Exception $e) {
        \Log::error('Error creating appointment: ' . $e->getMessage());
        return response()->json([
            'message' => 'Error interno del servidor',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}
