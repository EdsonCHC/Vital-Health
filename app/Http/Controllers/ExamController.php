<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;
use App\Models\citas;


class ExamController extends Controller
{

    public function index()
    {
        $exams = Exams::with([
            'patient:id,name',
            'doctor:id,name',
        ])->get();

        return view('laboratorio.Exam', compact('exams'));
    }
    public function checkAndEndCita($cita_id)
    {
        try {
            $cita = Citas::findOrFail($cita_id);
            $exams = Exams::where('cita_id', $cita_id)->get();
            $allExamsInStateZero = $exams->every(function ($exam) {
                return $exam->state === '0';
            });
            if ($allExamsInStateZero) {
                return response()->json([
                    'success' => true,
                    'message' => 'Todos los exámenes están Completados. Puedes  terminar la cita.',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No todos los exámenes están Completos. Completar todos los exámenes antes de terminar la cita.',
                ]);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Cita no encontrada',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al verificar los exámenes',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function endCita(Request $request, $cita_id)
    {
        try {
            $cita = Citas::findOrFail($cita_id);
            $cita->description = $request->input('description');
            $cita->state = '0';
            $cita->save();

            Exams::where('cita_id', $cita_id)->update(['state' => '0']);

            return response()->json([
                'success' => true,
                'message' => 'Cita finalizada y descripción actualizada correctamente.',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Cita no encontrada',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al finalizar la cita',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function getExams($cita_id, $user_id)
    {
        try {
            $cita = Citas::findOrFail($cita_id);
            $patient_id = $cita->patient_id;

            if ($patient_id != $user_id) {
                return response()->json([
                    'success' => false,
                    'message' => 'No autorizado para ver estos exámenes',
                ], 403);
            }

            // Obtener los exámenes relacionados con la cita y el paciente
            $exams = Exams::where('cita_id', $cita_id)->where('patient_id', $patient_id)->get();

            return response()->json([
                'success' => true,
                'exams' => $exams,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Cita no encontrada',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los exámenes',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function create(Request $request, $cita_id, $doctor_id)
    {
        try {
            // Validación de datos
            $validatedData = $request->validate([
                'exam_type' => 'required',
                'exam_date' => 'required|date',
                'notes' => 'required'
            ]);

            // Verificar si la cita existe y obtener el patient_id
            $cita = citas::findOrFail($cita_id);
            $patient_id = $cita->patient_id;

            // Crear un nuevo examen y asociarlo con la cita, el paciente y el doctor
            $exam = new Exams($validatedData);
            $exam->cita_id = $cita->id;
            $exam->patient_id = $patient_id;
            $exam->doctor_id = $doctor_id;
            $exam->save();

            return response()->json(['success' => true, 'message' => 'Examen creado exitosamente.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Cita no encontrada.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'message' => $e->validator->errors()->first()]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el examen: ' . $e->getMessage()]);
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
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el examen',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($exam_id)
    {
        try {
            $exam = Exams::findOrFail($exam_id);
            $exam->delete();

            return response()->json([
                'success' => true,
                'message' => 'Examen eliminado correctamente',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el examen',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function endExamen($exam_id)
    {
        try {
            $examen = Exams::findOrFail($exam_id);
            $examen->state = '0';
            $examen->save();

            return response()->json([
                'success' => true,
                'message' => 'Examen Finalizado correctamente',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error Finalizar el examen',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function updatePDF(Request $request, $exam_id)
    {

        try {

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('pdf_files', 'public');

                // Buscar y actualizar el registro del examen
                $examen = Exams::findOrFail($exam_id);
                $examen->pdf_file = $path;
                $examen->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Archivo enviado correctamente',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No se ha recibido ningún archivo.',
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
