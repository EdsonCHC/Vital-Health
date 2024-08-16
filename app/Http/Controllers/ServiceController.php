<?php

namespace App\Http\Controllers;

use App\Models\Categoría;
use App\Models\Doctor;

class ServiceController extends Controller
{
    public function show($id)
    {
        $categoria = Categoría::with('doctors')->findOrFail($id);
        return view('app.service', compact('categoria'));
    }
}
