<?php

namespace App\Http\Controllers;

use App\Models\Expedientes;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Doctor;
use App\Models\Usuario;
use App\Models\Receta;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // Crear usuario
        try {
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
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente'
            ], 201);
        } catch (\Exception $e) {
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

        // Obtener todos los usuarios
        $users = Usuario::all();

        // Obtener citas relacionadas con el doctor autenticado
        $citas = Citas::with('category')
            ->where('doctor_id', $doctorId)
            ->where('state', 1)
            ->get();

        // Obtener todos los exámenes relacionados con los usuarios (pacientes)
        $exams = Exams::whereIn('patient_id', $users->pluck('id'))
            ->where('state', 1)
            ->get();

        // Obtener todas las recetas relacionadas con los usuarios (pacientes)
        $recetas = Receta::with('medicinas')
            ->whereIn('patient_id', $users->pluck('id'))
            ->get();

        // Obtener todos los expedientes
        $expedientes = Expedientes::all();

        return view('doctor.files_doc', compact('users', 'expedientes', 'doctor', 'citas', 'exams', 'recetas'));
    }

    public function showFileAdmin()
    {
        $expedientes = Expedientes::all();

        return view('admin.files_admin', compact('expedientes'));
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
