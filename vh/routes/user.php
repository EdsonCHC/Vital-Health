<?php 

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



//User
Route::get('/', function () {
    return view('app.index');
});

Route::get('/login', function () {
    return view('app.login');
})->name('login');

Route::get('/registro', function () {
    return view('app.registro');
});

Route::post('/registro',[UsuarioController::class, 'store']); //controlador post

Route::get('/medicina', function() {
    return view('app.medicine');
})->middleware('auth');

Route::get('/about', function() {
    return view('app.about');
});

Route::get('/report', function() {
    return view('app.report');
})->middleware('auth');

Route::get('/examen', function() {
    return view('app.exams');
})->middleware('auth');

Route::get('/service', function() {
    return view('app.service');
});

Route::get('/chats', function() {
    return view('app.chats');
})->middleware('auth');

Route::get('/user', function() {
    return view('app.user_info');
})->middleware('auth');

Route::POST('/user', [UsuarioController::class, 'destroy']);

Route::get('/area', function () {
    return view('app.area');
})->middleware('auth');

Route::get('/citas', function () {
    return view('app.citas');
})->middleware('auth');


