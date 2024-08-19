<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Doctor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::with(['examen', 'cita', 'doctor', 'patient'])->get();

        $exams = Exams::all();
        $citas = citas::all();
        $doctors = Doctor::all();
        $patients = Usuario::all();

        return view('doctor.files_doc', compact('expedientes', 'exams', 'citas', 'doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'examen_id' => 'required|exists:exams,id',
            'cita_id' => 'required|exists:citas,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $expediente = Expediente::create([
            'examen_id' => $request->examen_id,
            'cita_id' => $request->cita_id,
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
        ]);

        return response()->json(['success' => true, 'expediente' => $expediente]);
    }



    public function show(Expediente $expediente)
    {
        return view('files_doc.show', compact('expediente'));
    }

    public function edit(Expediente $expediente)
    {
        return view('files_doc.edit', compact('expediente'));
    }

    public function update(Request $request, Expediente $expediente)
    {
        $request->validate([
            'examen_id' => 'required|exists:exams,id',
            'cita_id' => 'required|exists:citas,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $expediente->update($request->all());

        return redirect()->route('files_doc.index')->with('success', 'Expediente actualizado exitosamente.');
    }

    public function destroy(Expediente $expediente)
    {
        $expediente->delete();

        return redirect()->route('files_doc.index')->with('success', 'Expediente eliminado exitosamente.');
    }
}
