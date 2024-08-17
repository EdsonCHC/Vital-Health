<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams; // Asegúrate de que el nombre del modelo sea correcto
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function getExams($cita_id)
    {
        try {
            $exams = Exams::where('cita_id', $cita_id)->get();

            return response()->json([
                'success' => true,
                'exams' => $exams,
            ]);
        } catch (\Exception $e) {
            Log::error('Error al obtener los exámenes', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los exámenes',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request, $cita_id)
    {
        $validated = $request->validate([
            'exam_type' => 'required|string',
            'exam_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        try {
            // Crear el nuevo examen
            $exam = new Exams(); // Usa el nombre correcto del modelo
            $exam->cita_id = $cita_id;
            $exam->exam_type = $validated['exam_type'];
            $exam->exam_date = $validated['exam_date'];
            $exam->notes = $validated['notes'] ?? '';
            $exam->pdf_file = null; // Campo pdf_file establecido en null
            $exam->save();

            return response()->json([
                'success' => true,
                'message' => 'Examen creado correctamente',
            ]);
        } catch (\Exception $e) {
            Log::error('Error al crear el examen', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Error al crear el examen',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($cita_id, $exam_id)
    {
        try {
            $exam = Exams::where('cita_id', $cita_id)->where('id', $exam_id)->firstOrFail();
            $exam->delete();

            return response()->json([
                'success' => true,
                'message' => 'Examen eliminado correctamente',
            ]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar el examen', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el examen',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
