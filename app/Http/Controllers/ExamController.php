<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\citas;
use App\Models\Exams;


class ExamController extends Controller
{
    public function index()
    {
        $exams = Exams::all();
        return view('doctor.exams_doc', compact('exams'));
    }

    public function store(Request $request, $id)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'exam_type' => 'required|string',
            'exam_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Verificar si la cita existe
            $cita = citas::findOrFail($id);

            // Crear un nuevo examen asociado con la cita
            $exam = Exams::create([
                'state' => $request->input('state', '1'),
                'patient_id' => $cita->patient_id,
                'cita_id' => $request->cita_id,
                'doctor_id' => $cita->doctor_id,
                'exam_type' => $request->input('exam_type'),
                'exam_date' => $request->input('exam_date'),
                'notes' => $request->input('notes'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Examen creado exitosamente',
                'exam' => $exam,
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
}
