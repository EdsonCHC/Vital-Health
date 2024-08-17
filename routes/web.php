<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CategoríaController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\MedicineController;
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
//
Route::post('/login', [UsuarioController::class, 'show']);
//
Route::view('/login', 'app.login')->name('login');
//
Route::post('/login', [UsuarioController::class, 'show']);
//
Route::view('/registro', 'app.registro');
//
Route::post('/registro', [UsuarioController::class, 'store']);
//Show Doctor in user
Route::get('/', [UsuarioController::class, 'showDoctors']);


// Middlewares para el usuario
Route::middleware('auth')->group(function () {
    Route::view('/medicina', 'app.medicine');
    //
    Route::view('/report', 'app.report');
    //
    Route::view('/examen', 'app.exams');
    //
    Route::view('/area', 'app.area');
    //
    Route::view('/chats', 'app.chats');
    //
    Route::view('/service', 'app.service');
    //
    //Citas
    Route::get('create', [CitaController::class, 'create'])->name('citas.create');
    //
    Route::view('/citas', 'app.citas');
    //
    // Route::view('/area', [CitaController::class, 'index'])->name('app.area');
    Route::get('/area', [UsuarioController::class, 'indexu'])->name('user');
    //
    Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service');
    //
    //Account user
    Route::get('/user', [UsuarioController::class, 'index'])->name('user');
    //
    Route::post('/user', [UsuarioController::class, 'destroy']);
    //
    Route::put('/user/update', [UsuarioController::class, 'update'])->name('user.update');
    //
});

// Rutas para el doctor
Route::middleware(['auth:doctor'])->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    // 
    Route::get('/citas_doc', [CitaController::class, 'showCitas'])->name('doctor.citas_doc');
    // 
    Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');
    //
    Route::view('/allocation', 'doctor.allocation');
    //
    Route::view('/exams_doc', 'doctor.exams_doc');
    //
    Route::view('/medicine_doc', 'doctor.medicine_doc');
    //
    Route::view('/files_doc', 'doctor.files_doc');
    //
    Route::view('/service_doc', 'doctor.service_doc');
    //
    Route::view('/program_doc', 'doctor.program_doc');
    //
    Route::post('/doctor/logout', [DoctorController::class, 'destroy'])->name('doctor.logout');
    //
    // Ruta para obtener exámenes de una cita específica
    Route::get('/citas/{cita_id}/exams/{user_id}', [ExamController::class, 'getExams'])->name('exams.get');
    // Route::get('/citas/{cita_id}/exams', [ExamController::class, 'getExams'])->name('exams.get');
    //
    Route::post('/citas/{cita_id}/{doctor_id}/exams', [ExamController::class, 'create'])->name('citas.create');
    // Ruta para eliminar un examen específico
    Route::delete('/citas/{cita_id}/exams/{exam_id}', [ExamController::class, 'destroy'])->name('exams.destroy');
});


// Rutas del administrador
Route::middleware('auth:admin')->group(function () {
    Route::get('/home', [CategoríaController::class, 'index'])->name('home');
    //
    Route::get('/statistics/{id}', [CategoríaController::class, 'show'])->name('statistics.show');
    //
    Route::get('/records/{id}', [CategoríaController::class, 'showRecords'])->name('categorias.records');
    //
    Route::get('/ad_chats/{id}', [CategoríaController::class, 'showAd_chats'])->name('categorias.ad_chats');
    //
    Route::get('/staff/{id}', [CategoríaController::class, 'showStaff'])->name('categorias.staff');
    //
    Route::post('/staff/{id}', [DoctorController::class, 'create'])->name('staff.create');
    //
    Route::get('/staff/doctor/{id}', [DoctorController::class, 'getDoctor'])->name('doctor.info');
    //
    Route::delete('/staff/{id}', [DoctorController::class, 'deleteDoctor'])->name('staff.delete');
    //
    Route::put('/staff/{id}', [DoctorController::class, 'updateDoctor'])->name('staff.update');
    //
    Route::get('/calendar/{id}', [CategoríaController::class, 'showCalendar'])->name('categorias.calendar');
    //
    Route::delete('/appointments/{id}', [CitaController::class, 'destroy'])->name('appointments.destroy');
    //
    Route::get('/appointments/{id}', [CitaController::class, 'show'])->name('appointments.show');
    //
    Route::get('/categorias/{id}/doctores', [CitaController::class, 'getDoctorsByCategory']);
    //
    Route::get('/appointments/{id}', [CitaController::class, 'showAppointments'])->name('categorias.appointments');
    //
    Route::put('/citas/{id}', [CitaController::class, 'update']);
    //
    Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    //
    Route::resource('categorias', CategoríaController::class);
    //
    Route::put('/categorias/{id}/activate', [CategoríaController::class, 'activate'])->name('categorias.activate');
    //
    Route::put('/categorias/{id}/suspend', [CategoríaController::class, 'suspend'])->name('categorias.suspend');
});

//Rutas del laboratorio
Route::middleware('auth:laboratorio')->group(function () {
    Route::get('/index_lab', [LaboratorioController::class, 'index'])->name('index');
    // 
    Route::view('/Exam', 'laboratorio.Exam')->name('Exam');
    //
    Route::view('/Medicina', 'laboratorio.Medicina')->name('Medicina');
    //
    Route::get('/medicinas', [MedicineController::class, 'index'])->name('medicinas.index');
    Route::post('medicinas', [MedicineController::class, 'store'])->name('medicinas.store');
    Route::get('medicinas/{medicina}/edit', [MedicineController::class, 'edit'])->name('medicinas.edit');
    Route::put('medicinas/{medicina}', [MedicineController::class, 'update'])->name('medicinas.update');
    Route::delete('/medicinas/{medicina}', [MedicineController::class, 'destroy'])->name('medicinas.destroy');
    Route::patch('/medicinas/{medicina}/toggleStatus', [MedicineController::class, 'toggleStatus'])->name('medicinas.toggleStatus');

    Route::post('/laboratorio/logout', [LaboratorioController::class, 'destroy'])->name('laboratorio.logout');
});

// Route zoom
Route::get('/zoom-meeting', [ZoomController::class, 'createMeeting']);


// Fallback route (404)
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});
