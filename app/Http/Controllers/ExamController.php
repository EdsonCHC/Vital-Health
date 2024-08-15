<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;


class ExamController extends Controller
{
    public function index()
    {
        $exams = Exams::all();
        return view('doctor.exams_doc', compact('exams'));
    }
}
