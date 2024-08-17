<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        // Validar que la cita existe
        $cita = Citas::find($id);
        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }

        // Validar datos del examen
        $request->validate([
            'exam_type' => 'required|string',
            'exam_date' => 'required|date',
            'notes' => 'required|string',
        ]);

        // Crear examen
        $exam = Exams::create([
            'exam_type' => $request->exam_type,
            'exam_date' => $request->exam_date,
            'notes' => $request->notes,
            'cita_id' => $id, // Asociar con la cita
        ]);

        return response()->json(['message' => 'Examen creado con éxito', 'exam' => $exam], 201);
    }
}
