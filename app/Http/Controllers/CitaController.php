<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\Categoría;
use App\Models\Usuario;
use App\Models\Exams;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CitaController extends Controller
{
    public function showCitas()
    {
        $doctor = auth()->user();

        $citas = Citas::where('doctor_id', $doctor->id)->get();

        return view('doctor.citas_doc', compact('doctor', 'citas'));
    }

    public function historicalAppointments($doctorId)
    {
        $appointments = Citas::with(['patient', 'category'])
            ->where('doctor_id', $doctorId)
            ->where('state', 0)
            ->get();

        return response()->json($appointments);
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
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Manejar el caso donde la cita no se encuentra
            return response()->json([
                'message' => 'Cita no encontrada',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching appointment: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function getAppointmentDetails(Request $request)
    {
        $appointmentId = $request->input('id');
    
        try {
            $appointment = Citas::findOrFail($appointmentId);
    
            // Obtener nombres de las relaciones
            $patientName = $appointment->patient ? $appointment->patient->name : 'No asignado';
            $categoryName = $appointment->category ? $appointment->category->nombre : 'No disponible';
            $doctorName = $appointment->doctor ? $appointment->doctor->name : 'No asignado';
    
            return response()->json([
                'id' => $appointment->id,
                'date' => $appointment->date,
                'hour' => $appointment->hour,
                'modo' => $appointment->modo,
                'description' => $appointment->description,
                'state' => $appointment->state,  
                'patient_name' => $patientName,
                'category_name' => $categoryName,
                'doctor_name' => $doctorName,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cita no encontrada.',
            ], 404);
        }
    }

    public function showAppointments($id)
    {
        if (!is_numeric($id)) {
            return redirect()->back()->with('error', 'ID de categoría inválido.');
        }
    
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
    public function citasPaciente(Request $request)
    {
        $pacienteId = Auth::id();

        $citas = Citas::with('category', 'doctor')
            ->where('patient_id', $pacienteId)
            ->where('state', 1) 
            ->whereNotNull('doctor_id')
            ->get();

        return view('app.citas', compact('citas'));
    }

    public function citasFinalizadas()
    {
        $pacienteId = Auth::id();

        $citas = Citas::where('patient_id', $pacienteId)
            ->where('state', 0)
            ->get();

        return response()->json($citas);
    }


    public function store_doc(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'hour' => 'required|string|date_format:H:i',
            'modalidad' => 'required|string',
            'description' => 'nullable|string',
            'doctor_id' => 'required|exists:doctors,id',
            'category_id' => 'required|exists:categorias,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        try {
            $doctor = Doctor::find($validatedData['doctor_id']);
            if (!$doctor) {
                return response()->json(['success' => false, 'message' => 'Doctor no encontrado.'], 404);
            }

            if ($doctor->category_id != $validatedData['category_id']) {
                return response()->json(['success' => false, 'message' => 'Categoría no coincide con el doctor.'], 400);
            }

            $appointment = Citas::create([
                'date' => $validatedData['date'],
                'hour' => $validatedData['hour'],
                'modo' => $validatedData['modalidad'],
                'description' => $validatedData['description'] ?? '',
                'doctor_id' => $validatedData['doctor_id'],
                'category_id' => $validatedData['category_id'],
                'patient_id' => $validatedData['patient_id'],
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
                'success' => false,
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function getPatients()
    {
        $patients = Usuario::all();
        return response()->json(['patients' => $patients]);
    }

    public function show_doc($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            return response()->json($doctor);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Doctor not found'], 404);
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
