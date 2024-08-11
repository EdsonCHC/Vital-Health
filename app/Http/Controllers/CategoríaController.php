<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoría;
use Illuminate\Support\Facades\Storage;

class CategoríaController extends Controller
{
    public function index()
    {
        $categorias = Categoría::all();
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

        Categoría::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'caracteristicas' => $request->caracteristicas,
            'img' => $imageName,
            'activa' => true,
        ]);

        return response()->json(['message' => 'Categoría agregada exitosamente']);
    }

    public function show($id)
    {
        // Buscar la categoría por ID
        $categoria = Categoría::find($id);
        if (!$categoria) {
            return redirect('/')->with('error', 'Categoría no encontrada');
        }

        // Pasar la categoría a la vista
        return view('admin.statistics', ['categoria' => $categoria]);
    }

    public function showAppointments($id)
    {
        $categoria = Categoría::find($id);
        return view('admin.appointment', ['categoria' => $categoria]);
    }

    public function showRecords($id)
    {
        $categoria = Categoría::find($id);
        return view('admin.records', ['categoria' => $categoria]);
    }

    public function showAd_chats($id)
    {
        $categoria = Categoría::find($id);
        return view('admin.ad_chats', ['categoria' => $categoria]);
    }

    public function showStaff($id)
    {
        $categoria = Categoría::find($id);
        return view('admin.staff', ['categoria' => $categoria]);
    }

    public function showCalendar($id)
    {
        $categoria = Categoría::find($id);
        return view('admin.calendar', ['categoria' => $categoria]);
    }


    public function edit($id)
    {
        $categoria = Categoría::findOrFail($id);
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

        $categoria = Categoría::find($id);

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
        $categoria = Categoría::findOrFail($id);
        if ($categoria->img) {
            Storage::delete('public/images/' . $categoria->img);
        }
        $categoria->delete();

        return response()->json(['success' => 'Categoría eliminada correctamente.']);
    }

    public function suspend(Request $request, $id)
    {
        $categoria = Categoría::findOrFail($id);
        $categoria->activa = false;
        $categoria->save();

        $categoría = Categoría::findOrFail($id);
        $categoría->activa = false;
        $categoría->save();

        return response()->json(['message' => 'Categoría suspendida exitosamente']);
    }

    public function activate(Request $request, $id)
    {
        $categoria = Categoría::findOrFail($id);
        $categoria->activa = true;
        $categoria->save();

        return response()->json(['message' => 'Categoría activada exitosamente']);
    }
}
