<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\Doctor;
use App\Models\Receta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function index()
    {
        // Retrieve the currently authenticated doctor
        $doctor = Auth::guard('doctor')->user();

        // Count total patients
        $totalPatients = Usuario::count();

        // Count total appointments for the logged-in doctor
        $totalCitas = citas::where('doctor_id', $doctor->id)->count();

        // Count total recipes for the logged-in doctor
        $totalRecetas = Receta::where('doctor_id', $doctor->id)->count();

        // Fetch recent appointments for the logged-in doctor
        $recentCitas = citas::where('doctor_id', $doctor->id)
            ->orderBy('date', 'desc')
            ->limit(2)
            ->get()
            ->orderBy('date', 'desc')
            ->limit(2)
            ->get();

        // Fetch recent recipes for the logged-in doctor
        $recentRecetas = Receta::where('doctor_id', $doctor->id)
            ->orderBy('fecha_entrega', 'desc')  // Updated to use fecha_entrega
            ->limit(2)
            ->get();

        // Return view with the required data
        return view('doctor.doctor', compact('doctor', 'totalPatients', 'totalCitas', 'totalRecetas', 'recentCitas', 'recentRecetas'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'phone' => 'required|max:25',
            'age' => 'required|numeric|min:18',
            'gender' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'category_id' => 'required|numeric',
            'description' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear
        try {
            $doctor = Doctor::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'number' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender,
                'mail' => $request->email,
                'password' => Hash::make($request->password),
                'category_id' => $request->category_id,
                'description' => $request->description
            ]);

            if (!$doctor) {
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return response()->json($doctor);
    }

    public function deleteDoctor($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);

            if ($doctor) {

                $doctor->delete();

                return response()->json(['success' => 'El doctor ha sido eliminado']);
            }
            return response()->json(['message' => 'El doctor no pudo eliminarse'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateDoctor(Request $request, $id)
    {

        $doctor = Doctor::findOrFail($id);

        try {

            $validateInfo = $request->validate([
                'name' => 'required|max:255',
                'lastName' => 'required|max:255',
                'phone' => 'required|max:25',
                'age' => 'required|numeric|min:18',
                'gender' => 'required',
                'email' => 'required|email',
                'password' => '',
                'description' => 'required|max:1000',
            ]);

            $doctor->update($validateInfo);

            return response()->json([
                'message' => 'Success',
                'error' => 'Doctor actualizado correctamente',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request)
    {

        Auth::guard('doctor')->logout();

        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
