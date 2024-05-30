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

//User
Route::get('/', function () {
    return view('app.index');
});

Route::get('/login', function () {
    return view('app.login');
});

Route::get('/registro', function () {
    return view('app.registro');
});

Route::post('/registro',[UsuarioController::class, 'store']); //controlador post

Route::get('/medicina', function() {
    return view('app.medicine');
});

Route::get('/about', function() {
    return view('app.about');
});

Route::get('/report', function() {
    return view('app.report');
});

Route::get('/examen', function() {
    return view('app.exams');
});

Route::get('/service', function() {
    return view('app.service');
});

Route::get('/chats', function() {
    return view('app.chats');
});

Route::get('/user', function() {
    return view('app.user_info');
});
Route::get('/area', function () {
    return view('app.area');
});

Route::get('/citas', function () {
    return view('app.citas');
});


//Doctor
Route::get('/doctor', function () {
    return view('doctor.index_doc');
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


// Admin
Route::get('/statistics', function () {
    return view('admin.statistics');
});

Route::get('/appointment', function () {
    return view('admin.appointment');
});



