<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Routing\Controller as BaseController;

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
    
        // Eliminar la receta de la base de datos
        $receta->delete();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Receta cancelada correctamente'
        ]);
    }

    public function fetchRecetaDetails($id)
    {
        // Obtiene la receta con sus medicinas asociadas
        $receta = Receta::with('medicinas')->find($id);

        // Verifica si la receta existe
        if (!$receta) {
            return response()->json(['message' => 'Receta no encontrada'], 404);
        }

        // Devuelve la receta con las medicinas en formato JSON
        return response()->json(['receta' => $receta]);
    }
}
