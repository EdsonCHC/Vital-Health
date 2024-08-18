<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videollamada;
use Illuminate\Support\Str;

class VideollamadaController extends Controller
{
    public function create(Request $request)
    {
        $videollamada = new Videollamada();
        $videollamada->room_name = 'NombreDeTuSala';
        $videollamada->date = $request->input('date');
        $videollamada->hour = $request->input('hour');
        $videollamada->cita_id = $request->input('cita_id');
        $videollamada->doctor_id = $request->input('doctor_id');
        $videollamada->patient_id = $request->input('patient_id');
        $videollamada->link = url('/videollamada/' . Str::uuid());
        $videollamada->save();

        return response()->json(['enlace' => $videollamada->enlace]);
    }

    public function show($uuid)
    {
        $videollamada = Videollamada::where('link', url('/videollamada/' . $uuid))->firstOrFail();
        return view('jitsi', ['roomName' => $videollamada->room_name]);
    }
}
