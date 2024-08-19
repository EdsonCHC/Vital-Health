<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videollamada;
use Illuminate\Support\Str;
use App\Models\citas;

class VideollamadaController extends Controller
{
    public function index()
    {
        $exams = Videollamada::with([
            'patient:id,name',
            'doctor:id,name',
        ])->get();

        return view('doctor.videollamada', compact('videollamada'));
    }

    public function store(Request $request, $cita_id, $doctor_id)
    {
        try {
            $validateData = $request->validate([
                'roomName' => 'required|string',
                'date' => 'required|date',
                'hour' => 'required',
            ]);

            $cita = Citas::findOrFail($cita_id);
            $patient_id = $cita->patient_id;

            $videollamada = new Videollamada();
            $videollamada->room_name = $validateData['roomName']; // Asignar el valor de roomName al campo room_name
            $videollamada->date = $validateData['date'];
            $videollamada->hour = $validateData['hour'];
            $videollamada->cita_id = $cita->id;
            $videollamada->patient_id = $patient_id;
            $videollamada->doctor_id = $doctor_id;

            $videollamada->save();

            return response()->json(['success' => true, 'room_name' => $videollamada->room_name, 'message' => 'Videollamada creada exitosamente.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Cita no encontrada.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'message' => $e->validator->errors()->first()]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear la videollamada: ' . $e->getMessage()]);
        }
    }





    public function show(Request $request)
    {
        $roomName = $request->query('roomName');
        return view('app.videollamada', compact('roomName'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
            'hour' => 'sometimes|required|date_format:H:i',
            'enlace' => 'nullable|string|max:255',
            'cita_id' => 'sometimes|required|exists:citas,id',
            'doctor_id' => 'sometimes|required|exists:doctors,id',
            'patient_id' => 'sometimes|required|exists:patients,id',
        ]);

        $videollamada = Videollamada::findOrFail($id);
        $videollamada->update($request->all());
        return response()->json($videollamada);
    }

    public function destroy($id)
    {
        $videollamada = Videollamada::findOrFail($id);
        $videollamada->delete();
        return response()->json(null, 204);
    }
}
