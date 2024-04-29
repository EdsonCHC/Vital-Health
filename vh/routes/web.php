<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app.index');
});

Route::get('/login', function () {
    return view('app.login');
});

Route::get('/registro', function () {
    return view('app.registro');
});

Route::get('/medicina', function() {
    return view('app.medicine');
});

Route::get('/service', function() {
    return view('app.service');
});