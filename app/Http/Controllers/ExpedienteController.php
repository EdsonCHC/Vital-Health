<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Doctor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::with(['exam', 'cita', 'doctor', 'patient'])->get();

        $exams = Exams::all();
        $citas = citas::all();
        $doctors = Doctor::all();
        $patients = Usuario::all();

        return view('doctor.files_doc', compact('expedientes', 'exams', 'citas', 'doctors', 'patients'));
    }

    public function store(Request $request)
    {
        try {
            // Obtener el ID del usuario autenticado
            $userId = auth()->id();

            // Crear el expediente y guardar el ID del usuario autenticado
            $expediente = Expediente::create([
                'patient_id' => $userId, // Asegúrate de que el campo user_id está en tu tabla 'expediente'
            ]);

            return response()->json(['success' => true, 'expediente' => $expediente]);
        } catch (\Exception $e) {
            // Manejar la excepción y retornar error
            return response()->json([
                'success' => false,
                'message' => 'No se pudo crear el expediente. ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(Expediente $expediente)
    {
        return view('files_doc.show', compact('expediente'));
    }

    public function showFileUser()
    {
        // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        // Obtener los expedientes asociados con el paciente (o usuario) autenticado
        $expedientes = Expediente::where('patient_id', $userId)
            ->with('patient')
            ->get();

        return view('app.file', compact('expedientes'));
    }

    public function showFileDoc()
    {
        // Obtener todos los expedientes sin relaciones
        $expedientes = Expediente::all();

        return view('doctor.files_doc', compact('expedientes'));
    }

    public function edit(Expediente $expediente)
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
            $expediente = Expediente::findOrFail($id);

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
            $expediente = Expediente::findOrFail($id);

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
