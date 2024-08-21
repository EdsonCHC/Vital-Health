<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Receta;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class recetaController extends BaseController
{
    public function index()
    {
        $recetas = Receta::all();
        return view('laboratorio.Recetas', compact('recetas'));
    }

    public function enviarReceta($id)
    {
        $receta = Receta::findOrFail($id);
        $receta->estado = 'enviado';
        $receta->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Receta enviada correctamente',
            'receta' => $receta
        ]);
    }

    public function cancelarReceta($id)
    {
        $receta = Receta::findOrFail($id);

        $receta->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Receta cancelada correctamente'
        ]);
    }

    public function fetchRecetaDetails($id)
    {
        $receta = Receta::with('medicinas')->find($id);

        if (!$receta) {
            return response()->json(['message' => 'Receta no encontrada'], 404);
        }

        return response()->json(['receta' => $receta]);
    }

    public function getRecetas(){
        $recetas = Receta::all();
        return view('doctor.medicine_doc', compact('recetas'));
    }
    public function actualizarEstado(Request $request, $id)
    {
        $receta = Receta::find($id);
        if ($receta) {
            $receta->estado = $request->input('estado');
            $receta->save();

            return response()->json(['receta' => $receta]);
        }
        return response()->json(['error' => 'Receta no encontrada'], 404);
    }

    public function recetasPaciente()
    {
        $pacienteId = Auth::id();


        $recetas = Receta::with('medicinas')
            ->where('patient_id', $pacienteId)
            ->get();


        return view('app.medicina', compact('recetas'));
    }
}
