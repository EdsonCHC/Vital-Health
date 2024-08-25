<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\RecetaMedicina;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Medicina;
use Illuminate\Support\Facades\DB;
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
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $receta = Receta::findOrFail($id);

            // Actualizar el stock de medicamentos
            foreach ($receta->medicinas as $medicina) {
                Medicina::where('id', $medicina->id)
                    ->increment('stock', $receta->medicinas->find($medicina->id)->pivot->cantidad);
            }

            // Eliminar la receta
            $receta->delete();

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function create()
    {
        $medicinas = Medicina::all();
        return view('recetas.create', compact('medicinas'));
    }



    public function searchPatients(Request $request)
    {
        $query = $request->input('query');
        $patients = Usuario::where('name', 'LIKE', "%{$query}%")
            ->orWhere('mail', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($patients);
    }


    public function getRecetas()
    {
        $doctorId = auth()->user()->id;

        $medicinas = Medicina::all();

        $recetas = Receta::where('doctor_id', $doctorId)->get();

        return view('doctor.medicine_doc', compact('recetas','medicinas'));
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
