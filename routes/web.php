<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\CitaController;
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

// Rutas del usuario
Route::post('/appointments', [CitaController::class, 'store']);
Route::post('/login', [UsuarioController::class, 'show']);
Route::view('/', 'app.index')->name('home');
Route::view('/login', 'app.login')->name('login');
Route::post('/login', [UsuarioController::class, 'show']);

Route::view('/registro', 'app.registro');
Route::post('/registro', [UsuarioController::class, 'store']);

// Middlewares para el usuario
Route::middleware('auth')->group(function () {
    Route::view('/medicina', 'app.medicine');
    Route::view('/report', 'app.report');
    Route::view('/examen', 'app.exams');
    Route::view('/chats', 'app.chats');
    Route::view('/area', 'app.area');
    Route::view('/citas', 'app.citas');

    // CRUD User
    Route::get('/user', [UsuarioController::class, 'index'])->name('user');
    Route::post('/user', [UsuarioController::class, 'destroy']);
    Route::put('/user', [UsuarioController::class, 'update'])->name('user.update');
});

Route::view('/service', 'app.service');

// Rutas para el doctor
Route::middleware(['web', 'auth:doctor'])->group(function () {
    Route::view('/doctor', 'doctor.index_doc');
    Route::view('/citas_doc', 'doctor.citas_doc');
    Route::view('/allocation', 'doctor.allocation');
    Route::view('/exams_doc', 'doctor.exams_doc');
    Route::view('/medicine_doc', 'doctor.medicine_doc');
    Route::view('/files_doc', 'doctor.files_doc');
    Route::view('/service_doc', 'doctor.service_doc');
    Route::view('/program_doc', 'doctor.program_doc');

    Route::post('/doctor/logout', [Doctor::class, 'destroy'])->name('doctor.logout');
});


// Rutas del administrador
Route::middleware('auth:admin')->group(function () {
    Route::view('/home', 'admin.home');
    Route::view('/statistics', 'admin.statistics');
    Route::view('/appointment', 'admin.appointment');
    Route::view('/records', 'admin.records');
    Route::view('/ad_chats', 'admin.ad_chats');
    Route::view('/staff', 'admin.staff');
    Route::view('/calendar', 'admin.calendar')->name('calendar');

    // web.php o api.php
    Route::post('/admin/logout', [adminController::class, 'destroy'])->name('admin.logout');

});

// Fallback route (404)
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});
