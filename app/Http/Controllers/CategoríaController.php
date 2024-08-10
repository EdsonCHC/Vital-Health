<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoría;
use Illuminate\Support\Facades\Storage;

class CategoríaController extends Controller
{
    public function index()
    {
        $categorías = Categoría::all();
        return view('admin.home', compact('categorías'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripción' => 'nullable|string',
            'características' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
        }

        Categoría::create([
            'nombre' => $request->nombre,
            'descripción' => $request->descripción,
            'características' => $request->características,
            'img' => $imageName,
        ]);

        return response()->json(['message' => 'Categoría agregada exitosamente']);
    }

    public function edit($id)
    {
        $categoría = Categoría::findOrFail($id);
        return response()->json($categoría);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripción' => 'nullable|string',
            'características' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $categoría = Categoría::find($id);

        if ($request->hasFile('img')) {
            if ($categoría->img) {
                Storage::delete('public/images/' . $categoría->img);
            }
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
            $categoría->img = $imageName;
        }

        $categoría->update([
            'nombre' => $request->nombre,
            'descripción' => $request->descripción,
            'características' => $request->características,
        ]);

        return response()->json(['message' => 'Categoría actualizada exitosamente']);
    }

    public function destroy($id)
    {
        $categoría = Categoría::findOrFail($id);
        if ($categoría->img) {
            Storage::delete('public/images/' . $categoría->img);
        }
        $categoría->delete();

        return response()->json(['success' => 'Categoría eliminada correctamente.']);
    }
}
