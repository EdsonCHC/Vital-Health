<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CategoríaController;
use App\Http\Controllers\StatisticsController;
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

//Show Doctor
Route::get('/', [UsuarioController::class, 'showDoctors']);
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
    Route::put('/user/update', [UsuarioController::class, 'update'])->name('user.update');

});

Route::view('/service', 'app.service');

// Rutas para el doctor
Route::middleware(['auth:doctor'])->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::view('/citas_doc', 'doctor.citas_doc');
    Route::view('/allocation', 'doctor.allocation');
    Route::view('/exams_doc', 'doctor.exams_doc');
    Route::view('/medicine_doc', 'doctor.medicine_doc');
    Route::view('/files_doc', 'doctor.files_doc');
    Route::view('/service_doc', 'doctor.service_doc');
    Route::view('/program_doc', 'doctor.program_doc');

    Route::post('/doctor/logout', [DoctorController::class, 'destroy'])->name('doctor.logout');
});


// Rutas del administrador
Route::middleware('auth:admin')->group(function () {
    Route::get('/home', [CategoríaController::class, 'index'])->name('home');

    Route::get('/statistics/{id}', [CategoríaController::class, 'show'])->name('statistics.show');
    Route::get('/appointments/{id}', [CategoríaController::class, 'showAppointments'])->name('categorias.appointments');
    Route::get('/records/{id}', [CategoríaController::class, 'showRecords'])->name('categorias.records');
    Route::get('/ad_chats/{id}', [CategoríaController::class, 'showAd_chats'])->name('categorias.ad_chats');
    Route::get('/staff/{id}', [CategoríaController::class, 'showStaff'])->name('categorias.staff');
    Route::post('/staff/{id}', [DoctorController::class, 'create'])->name('staff.create');
    Route::get('/calendar/{id}', [CategoríaController::class, 'showCalendar'])->name('categorias.calendar');

    Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::resource('categorias', CategoríaController::class);
    Route::put('/categorias/{id}/activate', [CategoríaController::class, 'activate'])->name('categorias.activate');
    Route::put('/categorias/{id}/suspend', [CategoríaController::class, 'suspend'])->name('categorias.suspend');
});


// Fallback route (404)
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});
