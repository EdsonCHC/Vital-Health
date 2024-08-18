<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Doctor;

class pdfController extends Controller
{
    public function generatePDF($userID, $doctorID)
    {
        $patient = Usuario::findOrFail($userID);
        $doctor = Doctor::findOrFail($doctorID);

        $pdf = PDF::loadView('pdf-template', compact('user, doctor'));

        return $pdf->download('reporte.pdf');
    }
}
