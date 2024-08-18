<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;

class ExpedienteController extends Controller
{
    /**
     * Muestra una lista de expedientes.
     */
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expedientes.index', compact('expedientes'));
    }

    /**
     * Muestra el formulario para crear un nuevo expediente.
     */
    public function create()
    {
        return view('expedientes.create');
    }

    /**
     * Almacena un nuevo expediente en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'nacimiento' => 'required|date',
            'gender' => 'required|string|max:10',
            'mail' => 'required|email|max:255',
            'status_civil' => 'required|string|max:50',
            'occupation' => 'required|string|max:100',
            'Allergies' => 'nullable|string|max:255',
            'examen_id' => 'required|integer|exists:exams,id',
            'cita_id' => 'required|integer|exists:citas,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'patient_id' => 'required|integer|exists:patients,id',
        ]);

        Expediente::create($request->all());

        return redirect()->route('expedientes.index')->with('success', 'Expediente creado exitosamente.');
    }

    /**
     * Muestra un expediente específico.
     */
    public function show($id)
    {
        $expediente = Expediente::findOrFail($id);
        return view('expedientes.show', compact('expediente'));
    }

    /**
     * Muestra el formulario para editar un expediente existente.
     */
    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);
        return view('expedientes.edit', compact('expediente'));
    }

    /**
     * Actualiza un expediente existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'nacimiento' => 'required|date',
            'gender' => 'required|string|max:10',
            'mail' => 'required|email|max:255',
            'status_civil' => 'required|string|max:50',
            'occupation' => 'required|string|max:100',
            'Allergies' => 'nullable|string|max:255',
            'examen_id' => 'required|integer|exists:exams,id',
            'cita_id' => 'required|integer|exists:citas,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'patient_id' => 'required|integer|exists:patients,id',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->update($request->all());

        return redirect()->route('expedientes.index')->with('success', 'Expediente actualizado exitosamente.');
    }

    /**
     * Elimina un expediente de la base de datos.
     */
    public function destroy($id)
    {
        $expediente = Expediente::findOrFail($id);
        $expediente->delete();

        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado exitosamente.');
    }
}
