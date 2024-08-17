<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorio;
use App\Models\Medicina;
use Illuminate\Support\Facades\Auth;

class LaboratorioController extends Controller
{
    public function index()
    {
        $medicines = Medicina::all();
        return view('laboratorio.index_lab', compact('medicines'));

    }


    public function destroy(Request $request)
    {
        Auth::guard('laboratorio')->logout();

        try {
            // Invalidate the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Respond with the success message and URL
            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
