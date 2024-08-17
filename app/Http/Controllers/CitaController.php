<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\Categoría;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Citas::with('doctor')->get();
        $doctor = $citas->first()->doctor ?? null;

        return view('doctor.citas_doc', compact('citas', 'doctor'));
    }

    public function showDoctorCita()
    {
        // Obtener todas las citas con los doctores asociados
        $citas = Citas::with('doctor')->get();

        // Buscar la primera cita que tenga un doctor asociado
        $doctor = $citas->firstWhere('doctor_id', '!=', null)->doctor ?? null;

        // Pasar las citas y el doctor a la vista
        return view('doctor.citas_doc', compact('citas', 'doctor'));
    }



    public function update(Request $request, $id)
    {
        try {
            $appointment = Citas::findOrFail($id);
            $appointment->doctor_id = $request->input('doctor_id');
            $appointment->save();

            return response()->json([
                'success' => true,
                'message' => 'Cita actualizada exitosamente',
                'appointment' => $appointment // Devolver la cita actualizada
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating appointment: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $cita = Citas::findOrFail($id);
            return response()->json($cita);
        } catch (\Exception $e) {
            Log::error('Error fetching appointment: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function showAppointments($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }
        $citasAsignadas = Citas::where('category_id', $id)->whereNotNull('doctor_id')->get();
        $citasNoAsignadas = Citas::where('category_id', $id)->whereNull('doctor_id')->get();

        return view('admin.appointment', compact('categoria', 'citasAsignadas', 'citasNoAsignadas'));
    }

    public function getDoctorsByCategory($id)
    {
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $doctores = $categoria->doctors;
        return response()->json($doctores);
    }

    public function destroy($id)
    {
        try {
            $appointment = Citas::findOrFail($id);
            $appointment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cita eliminada exitosamente',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting appointment: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
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
            Log::error('Error creating appointment: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
