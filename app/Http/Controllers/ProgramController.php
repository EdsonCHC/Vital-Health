<?php

namespace App\Http\Controllers;

use App\Models\Videollamada;
use App\Models\citas;
use App\Models\ProgramDoc;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function showDoc(Request $request)
    {
        $doctor = auth()->user();

        // Obtener todas las citas del doctor
        $cita = Citas::where('doctor_id', $doctor->id)->first();

        // Arreglar esto 
        if (!$cita) {
            return redirect()->route('errors.404page')->with('message', 'No se encontró una videollamada para este doctor.');
        }

        // Obtener todos los registros de ProgramDoc relacionados con el doctor
        $program_docs = ProgramDoc::where('doctor_id', $doctor->id)->get();

        // Obtener las videollamadas
        $videollamadas = Videollamada::where('cita_id', $cita->id)->get();

        return view('doctor.program_doc', compact('videollamadas', 'program_docs'));
    }


    public function storeHomework(Request $request, $doctor_id)
    {
        $validator = Validator::make($request->all(), [
            'homeworks' => 'required|max:55',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();
            $homework = ProgramDoc::create([
                'homeworks' => $request->homeworks,
                'doctor_id' => $doctor_id, // Guarda el doctor_id
            ]);

            if (!$homework) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Error al crear la tarea',
                ], 500);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Tarea creada exitosamente'
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($doctor_id, $homework_id)
    {
        try {
            $homework = ProgramDoc::where('doctor_id', $doctor_id)
                ->where('id', $homework_id)
                ->firstOrFail();

            $homework->delete();

            return response()->json(['success' => true, 'message' => 'Tarea eliminada exitosamente.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar la tarea.'], 500);
        }
    }
}
