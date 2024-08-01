<?php

use App\Http\Controllers\UsuarioController;
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

/**
 * Rutas del usuario
 *
 */

Route::view('/', 'app.index')->name('home'); // Renombrado a Route::view

Route::view('/login', 'app.login')->name('login');
Route::post('/login', [UsuarioController::class, 'show']);

Route::view('/registro', 'app.registro');
Route::post('/registro', [UsuarioController::class, 'store']);

// middlewares para el usuario
Route::middleware('auth')->group(function () {
    Route::view('/medicina', 'app.medicine');
    Route::view('/report', 'app.report');
    Route::view('/examen', 'app.exams');
    Route::view('/chats', 'app.chats');
    Route::view('/area', 'app.area');
    Route::view('/citas', 'app.citas');


    //CRUD User
    Route::get('/user', [UsuarioController::class, 'index'])->name('user');
    Route::post('/user', [UsuarioController::class, 'destroy']);
    Route::post('/user/update', [UsuarioController::class, 'update'])->name('user.update');
});

Route::view('/service', 'app.service');

/**
 *  Rutas para el doctor
 */

Route::prefix('doctor')->group(function () {
    Route::view('/', 'doctor.index_doc');
    Route::view('/citas_doc', 'doctor.citas_doc');
    Route::view('/allocation', 'doctor.allocation');
    Route::view('/exams_doc', 'doctor.exams_doc');
    Route::view('/medicine_doc', 'doctor.medicine_doc');
    Route::view('/files_doc', 'doctor.files_doc');
    Route::view('/service_doc', 'doctor.service_doc');
    Route::view('/program_doc', 'doctor.program_doc');
});

/**
 * Rutas del administrador
 */

// Middlewares para el administrador 
Route::middleware('auth.admin')->group(function () {
    Route::view('/statistics', 'admin.statistics');
    Route::view('/appointment', 'admin.appointment');
    Route::view('/records', 'admin.records');
    Route::view('/ad_chats', 'admin.ad_chats');
    Route::view('/staff', 'admin.staff');
    Route::view('/calendar', 'admin.calendar')->name('calendar');
});


/**
 * Fallback rute (404)
 * 
 */
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});
