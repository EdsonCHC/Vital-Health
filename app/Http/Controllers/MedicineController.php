<?php

namespace App\Http\Controllers;

use App\Models\Medicina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MedicineController extends Controller
{
    public function index()
    {
        $medicinas = Medicina::all();
        return view('laboratorio.Medicina', compact('medicinas'));
    }

    public function edit(Medicina $medicina)
    {
        return response()->json($medicina);
    }

    public function update(Request $request, Medicina $medicina)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tipo' => 'required|in:tableta,jarabe',
            'stock' => 'required|numeric',
            'estado' => 'required|in:Disponible,No Disponible'
        ]);

        try {
            $medicina->update([
                'nombre' => $request->name,
                'descripcion' => $request->description,
                'tipo' => $request->tipo,
                'stock' => $request->stock,
                'estado' => $request->estado
            ]);

            return response()->json(['success' => 'Medicina actualizada']);
        } catch (\Exception $e) {
            Log::error('Error al actualizar la medicina: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al actualizar la medicina'], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tipo' => 'required|in:tableta,jarabe',
            'stock' => 'required|numeric',
            'estado' => 'required|in:Disponible,No Disponible'
        ]);

        try {
            Medicina::create([
                'nombre' => $request->name,
                'descripcion' => $request->description,
                'tipo' => $request->tipo,
                'stock' => $request->stock,
                'estado' => $request->estado
            ]);

            return response()->json(['success' => 'Medicina registrada']);
        } catch (\Exception $e) {
            Log::error('Error al registrar la medicina: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al registrar la medicina'], 500);
        }
    }

    public function destroy(Medicina $medicina)
    {
        try {
            $medicina->delete();
            return response()->json(['success' => 'Medicina eliminada']);
        } catch (\Exception $e) {
            Log::error('Error al eliminar la medicina: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al eliminar la medicina'], 500);
        }
    }
    public function toggleStatus(Medicina $medicina)
    {
        try {
            $medicina->estado = $medicina->estado === 'Disponible' ? 'No Disponible' : 'Disponible';
            $medicina->save();
            return response()->json(['success' => 'Estado de medicina cambiado']);
        } catch (\Exception $e) {
            Log::error('Error al cambiar el estado de la medicina: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al cambiar el estado de la medicina'], 500);
        }
    }

}
