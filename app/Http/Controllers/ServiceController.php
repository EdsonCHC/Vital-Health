<?php

namespace App\Http\Controllers;

use App\Models\Categoría;

class ServiceController extends Controller
{
    public function show($id)
    {
        $categoria = Categoría::findOrFail($id);
        return view('app.service', compact('categoria'));
    }

    
}
