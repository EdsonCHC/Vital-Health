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

//* USER ROUTES //

Route::get('/', function () {
    return view('app.index');
})->name('home');  //?  should it have a name?

Route::get('/login', function () {
    return view('app.login');
})->name('login');

Route::post('/login', [UsuarioController::class, 'show']);

Route::get('/registro', function () {
    return view('app.registro');
});

Route::post('/registro', [UsuarioController::class, 'store']); //controlador post

Route::get('/medicina', function () {
    return view('app.medicine');
})->middleware('auth');

Route::get('/about', function () {
    return view('app.about');
});

Route::get('/report', function () {
    return view('app.report');
})->middleware('auth');

Route::get('/examen', function () {
    return view('app.exams');
})->middleware('auth');

Route::get('/service', function () {
    return view('app.service');
});

Route::get('/chats', function () {
    return view('app.chats');
})->middleware('auth');

Route::get('/user', [UsuarioController::class, 'index'])->middleware('auth')->name('user');

Route::post('/user', [UsuarioController::class, 'destroy']);

Route::put('/user', [UsuarioController::class, 'update']);


Route::get('/area', function () {
    return view('app.area');
})->middleware('auth');

Route::get('/citas', function () {
    return view('app.citas');
})->middleware('auth');


//* DOCTOR ROUTES //

Route::get('/doctor', function () {
    return view('doctor.index_doc');
});
Route::get('/citas_doc', function () {
    return view('doctor.citas_doc');
});
Route::get('/allocation', function () {
    return view('doctor.allocation');
});
Route::get('/exams_doc', function () {
    return view('doctor.exams_doc');
});
Route::get('/medicine_doc', function () {
    return view('doctor.medicine_doc');
});
Route::get('/files_doc', function () {
    return view('doctor.files_doc');
});
Route::get('/service_doc', function () {
    return view('doctor.service_doc');
});
Route::get('/program_doc', function () {
    return view('doctor.program_doc');
});


//* ADMIN ROUTES // 
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
