<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CategoríaController;
use App\Http\Controllers\VideollamadaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\recetaController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DatoSensorController;
use App\Http\Controllers\LoginController;

// Auth::routes();

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
Route::view('/about', 'app.about');
Route::view('/registro', 'app.registro');
Route::view('/login', 'app.login')->name('login');
Route::get('/', [UsuarioController::class, 'showDoctors']);
Route::post('/login', [LoginController::class, 'show']);
Route::post('/registro', [UsuarioController::class, 'store']);

// Middlewares para el usuario
Route::middleware('auth')->group(function () {
    // Citas
    //
    Route::get('/citas', [CitaController::class, 'citasPaciente'])->name('citas.paciente');
    Route::get('create', [CitaController::class, 'create'])->name('citas.create');
    Route::get('/citas/completadas', [CitaController::class, 'citasFinalizadas'])->name('citas.completadas');
    Route::post('/appointments', [CitaController::class, 'store']);
    Route::delete('/citas/{id}/eliminar', [CitaController::class, 'eliminar']);
    //
    // Exámenes
    //
    Route::get('/examen', [ExamController::class, 'examsPaciente'])->name('exams.paciente');
    Route::get('/examenes/completados', [ExamController::class, 'examenesCompletados']);
    Route::get('/medicina', [recetaController::class, 'recetasPaciente'])->name('medicina.paciente');
    Route::get('/exams/patient/pdf/{id}', [ExamController::class, 'getPdfUrl'])->name('exams.get.pdf');
    Route::delete('/citas/{id}/eliminar', [CitaController::class, 'eliminar']);
    //
    //Info pages
    //
    Route::view('/service', 'app.service');
    Route::get('/area', [UsuarioController::class, 'indexu'])->name('user');
    route::get('/reunion', [VideollamadaController::class, 'showUser'])->name('app.reunion');
    Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service');
    Route::get('/area', [CategoríaController::class, 'filtrarYCategorias'])->name('categorias.filtrar');
    //
    //User
    //
    Route::get('/user', [UsuarioController::class, 'index'])->name('user');
    Route::get('/fileUser', [ExpedienteController::class, 'generatePdf']);
    Route::post('/user', [UsuarioController::class, 'destroy']);
    Route::put('/user/update', [UsuarioController::class, 'update'])->name('user.update');
    route::put('/user/update-password', [UsuarioController::class, 'updatePassword'])->name('user.updatePassword');
    route::post('/user/update-image', [UsuarioController::class, 'updateImage'])->name('user.updateImage');
    //
    //Examen
    //
    Route::get('/exams/patient/pdf/{id}', [ExamController::class, 'getPdfUrl'])->name('exams.get.pdf');
    //
    // Imagen
    //
    Route::get('/patient/{id}/image', [UsuarioController::class, 'showImage'])->name('patient.image');
});

// Middlewares para el doctor
Route::middleware(['auth:doctor'])->group(function () {
    //
    //Citas
    //
    Route::get('/citas_doc', [CitaController::class, 'showCitas'])->name('doctor.citas_doc');
    Route::get('/historical-appointments/{doctorId}', [CitaController::class, 'historicalAppointments'])->name('historical.appointments');
    Route::get('/pacientes', [CitaController::class, 'getPatients']);
    Route::get('/citas/{id}', [CitaController::class, 'show_doc']);
    Route::get('/doctor/{id}', [DoctorController::class, 'showDoctorWithAppointments'])->name('doctor.show');
    Route::post('/citas', [CitaController::class, 'store_doc']);
    Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');
    //
    // Signos Vitales
    //
    Route::post('/citas/{cita_id}/{doctor_id}/vital-sign', [DatoSensorController::class, 'store']);
    //
    //Recetas
    //
    Route::get('/recetas/get-prescription-form-details', [RecetaController::class, 'getPrescriptionFormDetails']);
    Route::delete('/recetas/{id}', [RecetaController::class, 'destroy']);
    Route::get('/citas_doc/search', [CitaController::class, 'search'])->name('appointments.search');
    //
    //Expedientes
    //
    Route::get('/files_doc', [ExpedienteController::class, 'showFileDoc'])->name('doctor.show');
    Route::get('/generate-pdf-doc', [ExpedienteController::class, 'generatePdf']);
    Route::post('/files_doc', [ExpedienteController::class, 'storeDocToUser'])->name('doctor.storeDocToUser');
    Route::put('/files_doc/{id}', [ExpedienteController::class, 'update'])->name('doctor.update_file');
    Route::delete('/files_doc/{id}', [ExpedienteController::class, 'destroy'])->name('doctor.destroy_file');
    //
    //Exámenes
    //
    Route::view('/exams_doc', 'doctor.exams_doc');
    Route::get('/citas/{cita_id}/exams/{user_id}', [ExamController::class, 'getExams']);
    Route::get('/citas/{cita_id}/check-end', [ExamController::class, 'checkAndEndCita']);
    Route::get('/recetas/fetch-prescription-form-data', [ExamController::class, 'fetchPrescriptionFormData'])->name('recetas.fetchFormData');
    Route::post('/recetas', [ExamController::class, 'store'])->name('recetas.create');
    Route::post('/citas/{cita_id}/{doctor_id}/exams', [ExamController::class, 'create']);
    Route::post('/citas/{cita_id}/end', [ExamController::class, 'endCita']);
    Route::delete('/citas/{cita_id}/exams/{id}', [ExamController::class, 'destroy']);
    //
    //Info pages
    //
    Route::view('/allocation', 'doctor.allocation');
    Route::get('/medicine_doc', [recetaController::class, 'getRecetas'])->name('doctor.medicine_doc');
    //
    // Program Doc
    //
    Route::get('/program_doc', [ProgramController::class, 'showDoc'])->name('doctor.program_doc');

    route::post('/program_doc/{doctor_id}', [ProgramController::class, 'storeHomework'])->name('doctor.storeHomework');
    Route::post('/citas/{cita_id}/{doctor_id}/videollamada', [VideollamadaController::class, 'store']);
    route::delete('/program_doc/{doctor_id}/{homework_id}', [ProgramController::class, 'destroy'])->name('doctor.deleteHomework');
    Route::delete('/program_doc/{videollamada_id}', [VideollamadaController::class, 'destroy'])->name('videollamada.destroy');
    //
    //Doctor
    //
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::post('/doctor/logout', [DoctorController::class, 'destroy'])->name('doctor.logout');
});

// Middlewares del administrador
Route::middleware('auth:admin')->group(function () {
    //
    Route::get('/statistics/{id}', [ChartController::class, 'index'])->name('statistics.index');
    Route::get('/statistics/{id}/personnel', [ChartController::class, 'getDoctorsByCategory'])->name('statistics.personnelByCategory');
    Route::get('/statistics/{id}/appointments', [ChartController::class, 'getAppointmentsByCategory'])->name('statistics.appointmentsByCategory');
    // Categorias
    //
    Route::get('/home', [CategoríaController::class, 'index'])->name('home');
    Route::get('/staff/{id}', [CategoríaController::class, 'showStaff'])->name('categorias.staff');
    Route::get('/records/{id}', [CategoríaController::class, 'showRecords'])->name('categorias.records');
    Route::get('/calendar/{id}', [CategoríaController::class, 'showCalendar'])->name('categorias.calendar');
    Route::put('/categorias/{id}/activate', [CategoríaController::class, 'activate'])->name('categorias.activate');
    Route::put('/categorias/{id}/suspend', [CategoríaController::class, 'suspend'])->name('categorias.suspend');
    Route::delete('/records/{id}', [CategoríaController::class, 'deleteUser'])->name('record.delete');
    Route::resource('categorias', CategoríaController::class);
    Route::delete('/categorias/{id}', [CategoríaController::class, 'destroy'])->name('categorias.destroy');
    //
    // Staff
    //
    Route::get('/staff/doctor/{id}', [DoctorController::class, 'getDoctor'])->name('doctor.info');
    Route::post('/staff/{id}', [DoctorController::class, 'create'])->name('staff.create');
    Route::put('/staff/{id}', [DoctorController::class, 'updateDoctor'])->name('staff.update');
    Route::delete('/staff/{id}', [DoctorController::class, 'deleteDoctor'])->name('staff.delete');
    //
    //Citas
    //
    Route::get('/appointments/{id}', [CitaController::class, 'show'])->name('appointments.show');
    Route::get('/categorias/{id}/doctores', [CitaController::class, 'getDoctorsByCategory']);
    Route::get('/appointments/{id}', [CitaController::class, 'showAppointments'])->name('categorias.appointments');
    Route::post('/appointments/details', [CitaController::class, 'getAppointmentDetails']);
    Route::put('/citas/{id}', [CitaController::class, 'update']);
    Route::delete('/appointments/{id}', [CitaController::class, 'destroy'])->name('appointments.destroy');
    //
    //Admin
    //
    Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

});
//
//Imagen
//
Route::get('/category/{id}/image', [CategoríaController::class, 'showImage'])->name('category.image');

// Middlewares del laboratorio
Route::middleware('auth:laboratorio')->group(function () {
    //
    // Medicina
    //
    Route::view('/Medicina', 'laboratorio.Medicina')->name('Medicina');
    //
    Route::get('/medicinas', [MedicineController::class, 'index'])->name('medicinas.index');
    Route::get('medicinas/{medicina}/edit', [MedicineController::class, 'edit'])->name('medicinas.edit');
    Route::post('medicinas', [MedicineController::class, 'store'])->name('medicinas.store');
    Route::put('medicinas/{medicina}', [MedicineController::class, 'update'])->name('medicinas.update');
    Route::delete('/medicinas/{medicina}', [MedicineController::class, 'destroy'])->name('medicinas.destroy');
    Route::patch('/medicinas/{medicina}/toggleStatus', [MedicineController::class, 'toggleStatus'])->name('medicinas.toggleStatus');
    //
    //Exámenes
    //
    Route::get('/Exam', [ExamController::class, 'index'])->name('Exam');
    Route::get('/exams/pdf/{id}', [ExamController::class, 'getPdfUrl'])->name('exams.get.pdf');
    Route::post('/exams/pdf/{id}', [ExamController::class, 'updatePDF'])->name('exams.update.pdf');
    Route::delete('/exams/delete/{id}', [ExamController::class, 'delete'])->name('exams.delete');
    Route::patch('/exams/end/{id}', [ExamController::class, 'endExamen'])->name('exams.delete');
    //
    //Recetas
    //
    Route::get('/index_lab', [LaboratorioController::class, 'index'])->name('index');
    Route::get('/Recetas', [recetaController::class, 'index'])->name('recetas.index');
    Route::get('/recetas/{id}', [recetaController::class, 'fetchRecetaDetails']);
    Route::post('/recetas/{id}/enviar', [recetaController::class, 'enviarReceta']);
    Route::post('/recetas/{id}/actualizar-estado', [recetaController::class, 'actualizarEstado']);
    Route::delete('/recetas/{id}/cancelar', [recetaController::class, 'cancelarReceta']);
    //
    //Laboratorio
    //
    Route::post('/laboratorio/logout', [LaboratorioController::class, 'destroy'])->name('laboratorio.logout');
});


//-------API ROUTES--------//

route::get('/videollamadaUser', [VideollamadaController::class, 'showRoomUser'])->name('app.videollamadaUser');

Route::get('/videollamadaDoc', [VideollamadaController::class, 'showRoomDoc'])->name('app.videollamadaDoc');

// Fallback route (404)
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});

//PDF
Route::post('/generate-pdf', [pdfController::class, 'generatePDF']);
Route::get('/view-pdf/{id}', [pdfController::class, 'viewPDF']);

//-- EMAIL VERIFICATION--//
Route::get('/verify-email/{id}/{token}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/verify-confirm', [UsuarioController::class, 'showRegistrationConfirmation'])->name('verify.confirm');
Route::get('/verify-confirmed', [UsuarioController::class, 'showVerificationSuccess'])->name('verify.confirmed');

//-- PASSWORD  RECOVERY --//
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
});

