<?php

// use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


//Doctor
Route::get('/doctor', function () {
    return view('doctor.index_doc');
});

Route::get('/exam_d', function () {
    return view('doctor.exam_doc');
});
