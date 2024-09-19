<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\Doctor;
use App\Models\Usuario;
use App\Models\Categoría;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index($id)
    {
        $categoria = Categoría::findOrFail($id);
        $doctores = Doctor::where('category_id', $id)->get();
        return view('admin.statistics', ['id' => $id, 'categoria' => $categoria, 'doctores' => $doctores]);
    }
    
    public function getDoctorsByCategory($category_id)
    {
        return response()->json(
            Doctor::where('category_id', $category_id)
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('date')
                ->get()
        );
    }

    public function getAppointmentsByCategory($category_id)
    {
        return response()->json(
            citas::where('category_id', $category_id)
                ->selectRaw('DATE(date) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('date')
                ->get()
        );
    }
}
