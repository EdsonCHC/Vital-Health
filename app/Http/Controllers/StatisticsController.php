<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoría;

class StatisticsController extends Controller
{
    public function show($id)
    {
        // Buscar la categoría por ID
        $categoría = Categoría::find($id);
        if (!$categoría) {
            return redirect('/')->with('error', 'Categoría no encontrada');
        }

        // Pasar la categoría a la vista
        return view('admin.statistics', compact('categoría'));
    }
}
