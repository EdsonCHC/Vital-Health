<?php

// use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


// Admin
Route::get('/statistics', function () {
    return view('admin.statistics');
});

Route::get('/appointment', function () {
    return view('admin.appointment');
});
