<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.home', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
        }

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'caracteristicas' => $request->caracteristicas,
            'img' => $imageName,
        ]);

        return response()->json(['message' => 'Categoría agregada exitosamente']);
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $categoria = Categoria::find($id);

        if ($request->hasFile('img')) {
            if ($categoria->img) {
                Storage::delete('public/images/' . $categoria->img);
            }
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
            $categoria->img = $imageName;
        }

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'caracteristicas' => $request->caracteristicas,
        ]);

        return response()->json(['message' => 'Categoría actualizada exitosamente']);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria->img) {
            Storage::delete('public/images/' . $categoria->img);
        }
        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada exitosamente']);
    }
}
