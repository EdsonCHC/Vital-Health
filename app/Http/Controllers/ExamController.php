<?php

namespace App\Http\Controllers;

use App\Models\Categoría;
use Illuminate\Http\Request;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Receta;
use App\Models\RecetaMedicina;
use App\Models\Medicina;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
    public function examsPaciente(Request $request)
    {
        $pacienteId = Auth::id();

        $examenes = Exams::where('patient_id', $pacienteId)
            ->get(['exam_type', 'exam_date', 'notes', 'state', 'id']);

        return view('app.exams', compact('examenes'));
    }

    public function examenesCompletados()
    {
        $pacienteId = Auth::id();

        $examenes = Exams::where('patient_id', $pacienteId)
            ->where('state', 0)
            ->get();

        return response()->json($examenes);
    }

    public function fetchPrescriptionFormData(Request $request)
    {
        $cita = Citas::find($request->cita_id);

        if (!$cita) {
            return response()->json(['success' => false, 'message' => 'Cita no encontrada'], 404);
        }

        $doctor_id = $cita->doctor_id;
        $patient_id = $cita->patient_id;

        $medicinas = Medicina::all();

        return response()->json([
            'success' => true,
            'doctor_id' => $doctor_id,
            'patient_id' => $patient_id,
            'medicinas' => $medicinas
        ]);
    }
  

    public function store(Request $request)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'fecha_entrega' => 'required|date',
            'hora_entrega' => 'required|date_format:H:i',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'codigo_receta' => 'required|string|max:255',
            'medicinas' => 'required|array',
            'medicinas.*.id' => 'required|exists:medicinas,id',
            'medicinas.*.cantidad' => 'required|integer|min:1'
        ]);
    
        DB::beginTransaction();
    
        try {
            // Filtrar medicinas disponibles y con suficiente stock
            $medicinasValidas = collect($validatedData['medicinas'])->map(function ($medicina) {
                $medicinaModel = Medicina::where('id', $medicina['id'])
                    ->where('estado', 'Disponible')
                    ->first();
    
                if ($medicinaModel && $medicinaModel->stock >= $medicina['cantidad']) {
                    return [
                        'id' => $medicinaModel->id,
                        'cantidad' => $medicina['cantidad']
                    ];
                }
    
                return null;
            })->filter()->values();
    
            // Verificar si hay medicinas válidas
            if ($medicinasValidas->isEmpty()) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'No hay medicinas disponibles o con suficiente stock.'
                ], 400);
            }
    
            // Crear la receta
            $receta = Receta::create([
                'cita_id' => $validatedData['cita_id'],
                'doctor_id' => $validatedData['doctor_id'],
                'patient_id' => $validatedData['patient_id'],
                'fecha_entrega' => $validatedData['fecha_entrega'],
                'hora_entrega' => $validatedData['hora_entrega'],
                'titulo' => $validatedData['titulo'],
                'descripcion' => $validatedData['descripcion'],
                'codigo_receta' => $validatedData['codigo_receta'],
                'estado' => 'pendiente'
            ]);
    
            foreach ($medicinasValidas as $medicina) {
                $medicinaModel = Medicina::find($medicina['id']);
                if ($medicinaModel->stock < $medicina['cantidad']) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'No hay suficiente stock para la medicina: ' . $medicinaModel->nombre
                    ], 400);
                }
    
                $medicinaModel->stock -= $medicina['cantidad'];
                $medicinaModel->save();
    
                RecetaMedicina::create([
                    'receta_id' => $receta->id,
                    'medicina_id' => $medicina['id'],
                    'cantidad' => $medicina['cantidad']
                ]);
            }
    
            DB::commit();
    
            return response()->json(['success' => true, 'receta' => $receta]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar la receta: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'Hubo un problema al crear la receta.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    


    private function generateCodigoReceta()
    {
        return strtoupper(uniqid('REC', true));
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

    public function viewServiceDoc()
    {
        try {
            $doctor = auth()->user();

            $citas = Citas::where('doctor_id', $doctor->id)->get();

            return view('doctor.service_doc', compact('doctor', 'citas'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Información no encontrada no encontrada',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
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

    public function getPdfUrl($exam_id)
    {
        try {
            $examen = Exams::findOrFail($exam_id);

            return response()->json([
                'success' => true,
                'message' => $examen->pdf_file,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
