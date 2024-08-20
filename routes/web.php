<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CategoríaController;
use App\Http\Controllers\VideollamadaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\recetaController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ExpedienteController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
//
Route::get('/', [UsuarioController::class, 'showDoctors']);

Route::view('/about', 'app.about');

// Middlewares para el usuario
Route::middleware('auth')->group(function () {
    Route::view('/medicina', 'app.medicina');
    //
    //
    Route::view('/citas', 'app.citas');
    Route::get('/citas', [CitaController::class, 'citasPaciente'])->name('citas.paciente');
    //
    Route::get('/citas/completadas', [CitaController::class, 'citasFinalizadas'])->name('citas.completadas');

    Route::get('/file', [ExpedienteController::class, 'showFileUser'])->name('app.file');
    Route::post('/file', [ExpedienteController::class, 'store']);
    //
    Route::view('/examen', 'app.exams');
    Route::get('/examen', [ExamController::class, 'examsPaciente'])->name('exams.paciente');
    Route::get('/examenes/completados', [ExamController::class, 'examenesCompletados']);
    Route::get('/medicina', [RecetaController::class, 'recetasPaciente'])->name('medicina.paciente');
    Route::delete('/citas/{id}/eliminar', [CitaController::class, 'eliminar']);
    //
    Route::view('/area', 'app.area');
    //
    Route::view('/chats', 'app.chats');
    //
    Route::view('/service', 'app.service');
    //
    Route::get('create', [CitaController::class, 'create'])->name('citas.create');
    //
    //
    // Route::view('/area', [CitaController::class, 'index'])->name('app.area');
    Route::get('/area', [UsuarioController::class, 'indexu'])->name('user');
    //
    Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service');
    //
    Route::get('/user', [UsuarioController::class, 'index'])->name('user');
    //
    Route::post('/user', [UsuarioController::class, 'destroy']);
    //
    Route::put('/user/update', [UsuarioController::class, 'update'])->name('user.update');
    //
    Route::post('/appointments', [CitaController::class, 'store']);
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
    // Expediente
    // Ruta para mostrar un expediente específico
    Route::get('/files_doc', [ExpedienteController::class, 'showFileDoc'])->name('files_doc.show');
    Route::put('/files_doc/{id}', [ExpedienteController::class, 'update'])->name('doctor.update_file');
    Route::delete('/files_doc/{id}', [ExpedienteController::class, 'destroy'])->name('doctor.destroy_file');
    //
    Route::view('/service_doc', 'doctor.service_doc');
    //
    Route::get('/program_doc', [VideollamadaController::class, 'showVideollamadaDoc'])->name('doctor.program_doc');
    //
    Route::post('/doctor/logout', [DoctorController::class, 'destroy'])->name('doctor.logout');
    //
    //
    Route::get('/citas/{cita_id}/exams/{user_id}', [ExamController::class, 'getExams']);
    Route::post('/citas/{cita_id}/{doctor_id}/exams', [ExamController::class, 'create']);
    Route::delete('/citas/{cita_id}/exams/{id}', [ExamController::class, 'destroy']);
    //
    // Videollamada
    Route::post('/citas/{cita_id}/{doctor_id}/videollamada', [VideollamadaController::class, 'store']);
    Route::delete('/program_doc/{videollamada_id}', [VideollamadaController::class, 'destroy'])->name('videollamada.destroy');
    //
    Route::get('/citas/{cita_id}/check-end', [ExamController::class, 'checkAndEndCita']);
    Route::post('/citas/{cita_id}/end', [ExamController::class, 'endCita']);
    Route::post('/recetas', [ExamController::class, 'store'])->name('recetas.create');
    Route::get('/recetas/fetch-prescription-form-data', [ExamController::class, 'fetchPrescriptionFormData'])->name('recetas.fetchFormData');
    Route::get('/historical-appointments/{doctorId}', [CitaController::class, 'historicalAppointments'])->name('historical.appointments');
    Route::post('/citas', [CitaController::class, 'store_doc']);
    Route::get('/pacientes', [CitaController::class, 'getPatients']);
    Route::get('/citas/{id}', [CitaController::class, 'show_doc']);
    Route::get('/doctor/{id}', [DoctorController::class, 'showDoctorWithAppointments'])->name('doctor.show');
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
    Route::post('/appointments/details', [CitaController::class, 'getAppointmentDetails']);

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
    Route::get('/Exam', [ExamController::class, 'index'])->name('Exam');
    //
    Route::view('/Medicina', 'laboratorio.Medicina')->name('Medicina');
    //
    Route::get('/medicinas', [MedicineController::class, 'index'])->name('medicinas.index');
    //
    Route::post('medicinas', [MedicineController::class, 'store'])->name('medicinas.store');
    //
    Route::get('medicinas/{medicina}/edit', [MedicineController::class, 'edit'])->name('medicinas.edit');
    //
    Route::get('/Recetas', [recetaController::class, 'index'])->name('recetas.index');
    Route::get('/recetas/{id}', [recetaController::class, 'fetchRecetaDetails']);
    Route::post('/recetas/{id}/enviar', [recetaController::class, 'enviarReceta']);
    Route::delete('/recetas/{id}/cancelar', [recetaController::class, 'cancelarReceta']);
    Route::post('/recetas/{id}/actualizar-estado', [recetaController::class, 'actualizarEstado']);

    Route::put('medicinas/{medicina}', [MedicineController::class, 'update'])->name('medicinas.update');
    //
    Route::delete('/medicinas/{medicina}', [MedicineController::class, 'destroy'])->name('medicinas.destroy');
    //
    Route::patch('/medicinas/{medicina}/toggleStatus', [MedicineController::class, 'toggleStatus'])->name('medicinas.toggleStatus');
    //
    Route::post('/laboratorio/logout', [LaboratorioController::class, 'destroy'])->name('laboratorio.logout');
    //
    Route::delete('/exams/delete/{id}', [ExamController::class, 'delete'])->name('exams.delete');
    //
    Route::patch('/exams/end/{id}', [ExamController::class, 'endExamen'])->name('exams.delete');
    //
    Route::post('/exams/pdf/{id}', [ExamController::class, 'updatePDF'])->name('exams.update.pdf');
    //
    Route::get('/exams/pdf/{id}', [ExamController::class, 'getPdfUrl'])->name('exams.get.pdf');
});



//-------API ROUTES--------//

// routes/web.php
Route::get('/videollamada', [VideollamadaController::class, 'show']);
// Route::get('/videollamada', [VideollamadaController::class, 'show']);

// Fallback route (404)
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});

//qr
Route::get('/qrcode', function () {
    return QrCode::size(200)->generate('https://google.com'); // Es porque hay que actualizar el composer
});

Route::get('/pdf', function () {
    return view('pdf.pdf_examen');
});
