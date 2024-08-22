<?php

namespace App\Http\Controllers;

use App\Models\Expedientes;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Doctor;
use App\Models\Usuario;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expedientes::with(['exam', 'cita', 'doctor', 'patient'])->get();

        $exams = Exams::all();
        $citas = citas::all();
        $doctors = Doctor::all();
        $patients = Usuario::all();

        return view('doctor.files_doc', compact('expedientes', 'exams', 'citas', 'doctors', 'patients'));
    }

    public function storeFileUser(Request $request)
    {
        try {
            $userId = auth()->id();

            $expediente = Expedientes::create([
                'patient_id' => $userId,
            ]);

            return response()->json(['success' => true, 'expediente' => $expediente]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo crear el expediente. ' . $e->getMessage()
            ], 500);
        }
    }

    public function showFileDoc()
    {
        $doctor = auth()->user();
        $doctorId = $doctor->id;

        $citas = Citas::where('doctor_id', $doctorId)->get();

        $exams = collect();
        $recetas = collect();

        foreach ($citas as $cita) {
            $patientId = $cita->patient_id;

            $examsForCita = Exams::where('cita_id', $cita->id)
                ->where('patient_id', $patientId)
                ->get();

            $exams = $exams->merge($examsForCita);

            $recetasForCita = Receta::where('cita_id', $cita->id)->get();
            $recetas = $recetas->merge($recetasForCita);
        }

        $expedientes = Expedientes::all();
        return view('doctor.files_doc', compact('expedientes', 'doctor', 'citas', 'exams', 'recetas'));
    }


    public function edit(Expedientes $expediente)
    {
        return view('files_doc.edit', compact('expediente'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validar los datos de la solicitud
            $request->validate([
                // Agrega las reglas de validación aquí según tus necesidades
                'patient_id' => 'required|exists:patients,id',
                // Otros campos que puedes necesitar
            ]);

            // Encontrar el expediente por ID
            $expediente = Expedientes::findOrFail($id);

            // Actualizar los campos
            $expediente->update([
                'patient_id' => $request->input('patient_id'),
                // Actualiza otros campos si es necesario
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Expediente actualizado correctamente',
                'expediente' => $expediente
            ]);
        } catch (\Exception $e) {
            // Manejar la excepción y retornar error
            return response()->json([
                'success' => false,
                'message' => 'No se pudo actualizar el expediente. ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Encontrar el expediente por ID
            $expediente = Expedientes::findOrFail($id);

            // Eliminar el expediente
            $expediente->delete();

            return response()->json([
                'success' => true,
                'message' => 'Expediente eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            // Manejar la excepción y retornar error
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar el expediente. ' . $e->getMessage()
            ], 500);
        }
    }
}
