<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use App\Models\citas;
use App\Models\Doctor;
use App\Models\Receta;
use App\Models\Usuario;
use App\Models\Expedientes;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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

    public function storeDocToUser(Request $request)
    {
        // Validar datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'mail' => 'required|email|unique:patients',
            'address' => 'required|max:255',
            'gender' => 'required',
            'birth' => 'required|date',
            'blood' => 'required',
            'password' => 'required|min:8',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }

        // Crear usuario y expediente
        try {
            DB::beginTransaction(); // Iniciar una transacción

            // Crear el paciente (usuario)
            $user = Usuario::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'mail' => $request->mail,
                'address' => $request->address,
                'gender' => $request->gender,
                'birth' => $request->birth,
                'blood' => $request->blood,
                'password' => Hash::make($request->password),
                'img' => $imagePath,
            ]);

            if (!$user) {
                DB::rollBack(); // Revertir transacción en caso de fallo
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }

            $doctorId = auth()->id();

            // Crear expediente relacionado al usuario (paciente)
            $expediente = Expedientes::create([
                'patient_id' => $user->id, // Relaciona el expediente con el paciente
                'doctor_id' => $doctorId, // Asigna el ID del doctor autenticado
            ]);

            if (!$expediente) {
                DB::rollBack(); // Revertir transacción en caso de fallo
                return response()->json([
                    'message' => 'Error al crear el expediente',
                ], 500);
            }

            DB::commit(); // Confirmar la transacción si todo sale bien

            return response()->json([
                'success' => true,
                'message' => 'Usuario y expediente creados exitosamente'
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack(); // Revertir transacción en caso de excepción
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function showFileDoc()
    {
        $doctor = auth()->user();
        $doctorId = $doctor->id;

        $users = Usuario::all();

        $citas = Citas::with('category')
            ->where('doctor_id', $doctorId)
            ->where('state', 1)
            ->get();

        $exams = Exams::whereIn('patient_id', $users->pluck('id'))
            ->where('state', 1)
            ->get();

        $recetas = Receta::with('medicinas')
            ->whereIn('patient_id', $users->pluck('id'))
            ->get();

        $expedientes = Expedientes::with('patient')->get();

        return view('doctor.files_doc', compact('users', 'expedientes', 'doctor', 'citas', 'exams', 'recetas'));
    }

    public function generatePdf()
    {
        try {
            $doctor = auth()->user();
            $user = Usuario::all();
            $userId = $user->id;

            // Recupera los datos necesarios
            $citas = Citas::with('category')
                ->where('patient_id', $userId)
                ->where('state', 1)
                ->get();

            $exams = Exams::where('patient_id', $userId)
                ->where('state', 1)
                ->get();

            $recetas = Receta::with('medicinas')
                ->where('patient_id', $userId)
                ->get();

            // Pasa los datos a la vista
            $pdf = PDF::loadView('pdf.file', [
                'citas' => $citas,
                'exams' => $exams,
                'recetas' => $recetas,
                'user' => $user
            ]);

            // Devuelve el PDF como una descarga
            return $pdf->download('Expediente.pdf');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo actualizar el expediente. ' . $e->getMessage()
            ], 500);
        }
    }



    public function edit(Expedientes $expediente)
    {
        return view('files_doc.edit', compact('expediente'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'state' => 'required|in:0,1' // Asegúrate de que el estado sea 0 o 1
            ]);

            $expediente = Expedientes::findOrFail($id);

            $expediente->update([
                'state' => $request->input('state'),
                // No actualices patient_id aquí
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Expediente actualizado correctamente',
                'expediente' => $expediente
            ]);
        } catch (\Exception $e) {
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
