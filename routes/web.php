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

//  ruta principal
Route::get('/', function () {
    return view('app.index');
})->name('home');

// ruta hacia el login 
Route::get('/login', function () {
    return view('app.login');
})->name('login');

// ruta de respuesta del login
Route::post('/login', [UsuarioController::class, 'show']);

//ruta hacia el registro
Route::get('/registro', function () {
    return view('app.registro');
})->name('registro');

//ruta para registrar
Route::post('/registro', [UsuarioController::class, 'store'])->name('register'); //controlador post

//ruta hacia medicina
Route::get('/medicina', function () {
    return view('app.medicine');
})->middleware('auth')->name('medicine');

//ruta hacia about us
Route::get('/about', function () {
    return view('app.about');
})->name('about');

//ruta hacia los reportes
Route::get('/report', function () {
    return view('app.report');
})->middleware('auth')->name('report');

//ruta de exámenes
Route::get('/examen', function () {
    return view('app.exams');
})->middleware('auth')->name('tests');

//ruta hacia los servicios
Route::get('/service', function () {
    return view('app.service');
})->name('services');

//ruta hacia los chats
Route::get('/chats', function () {
    return view('app.chats');
})->middleware('auth')->name('chats');

//ruta hacia el usuario
Route::get('/user', [UsuarioController::class, 'index'])->middleware('auth')->name('user');

//ruta depara logout del usuario
Route::post('/user', [UsuarioController::class, 'destroy'])->name('user_logout');

//ruta de actualización del usuario
Route::patch('/user', [UsuarioController::class, 'update'])->name('user_update');

//ruta hacia el area de usuario
Route::get('/area', function () {
    return view('app.area');
})->middleware('auth')->name('area');

//ruta hacia las citas
Route::get('/citas', function () {
    return view('app.citas');
})->middleware('auth')->name('citas');


/**
 *  Rutas para el doctor
 */

//ruta pagina principal doctor
Route::get('/doctor', function () {
    return view('doctor.index_doc');
});

//ruta para las citas del doctor
Route::get('/citas_doc', function () {
    return view('doctor.citas_doc');
});

//rutas para ----
Route::get('/allocation', function () {
    return view('doctor.allocation');
});

//rutas para los exmenes pendientes asignados al doctor
Route::get('/exams_doc', function () {
    return view('doctor.exams_doc');
});

//ruta para las medicinas recetasdas por el doctor
Route::get('/medicine_doc', function () {
    return view('doctor.medicine_doc');
});

//ruta para -----
Route::get('/files_doc', function () {
    return view('doctor.files_doc');
});

//ruta para los servicios del doctor ?????
Route::get('/service_doc', function () {
    return view('doctor.service_doc');
});

//ruta para el programa del doctor 
Route::get('/program_doc', function () {
    return view('doctor.program_doc');
});


/**
 * Rutas para el administrador
 */

Route::get('/statistics', function () {
    return view('admin.statistics');
})->middleware('auth.admin');

Route::get('/appointment', function () {
    return view('admin.appointment');
})->middleware('auth.admin');

Route::get('/records', function () {
    return view('admin.records');
})->middleware('auth.admin');

Route::get('/ad_chats', function () {
    return view('admin.ad_chats');
})->middleware('auth.admin');

Route::get('/staff', function () {
    return view('admin.staff');
})->middleware('auth.admin');

Route::get('/calendar', function () {
    return view('admin.calendar');
})->middleware('auth.admin')->name('calendar');


//ruta fallback
Route::fallback(function () {
    return response()->view('errors.404page', [], 404);
});
