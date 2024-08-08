<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function index()
    {
        $doctor = Auth::guard('doctor')->user();
        return view('doctor.index_doc', ['doctor' => $doctor]);

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
