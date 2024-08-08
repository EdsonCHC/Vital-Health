<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class StatisticsController extends Controller
{
    public function show($id)
    {
        // Buscar la categoría por ID
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return redirect('/')->with('error', 'Categoría no encontrada');
        }

        // Pasar la categoría a la vista
        return view('admin.statistics', compact('categoria'));
    }
}
