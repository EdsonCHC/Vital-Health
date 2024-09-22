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

        // Obtener todas las tareas del doctor
        $program_docs = ProgramDoc::where('doctor_id', $doctor->id)->get();

        // Obtener todas las citas del doctor
        $citas = Citas::where('doctor_id', $doctor->id)->get();

        // Si no hay citas, pasar un mensaje a la vista
        if ($citas->isEmpty()) {
            $message = 'No tienes citas pendientes.';
            return view('doctor.program_doc', compact('message', 'program_docs'));
        }

        // Obtener las videollamadas relacionadas con todas las citas del doctor
        $videollamadas = Videollamada::whereIn('cita_id', $citas->pluck('id'))->get();

        // Extraer las fechas de las citas y videollamadas
        $fechasCitas = $citas->pluck('fecha')->toArray();
        $fechasVideollamadas = $videollamadas->pluck('date')->toArray();

        // Pasar las videollamadas y fechas a la vista
        return view('doctor.program_doc', compact('doctor', 'videollamadas', 'program_docs', 'fechasCitas', 'fechasVideollamadas'));
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
