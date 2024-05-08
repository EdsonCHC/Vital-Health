<?php

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

Route::get('/', function () {
    return view('app.index');
});

Route::get('/login', function () {
    return view('app.login');
});

Route::get('/registro', function () {
    return view('app.registro');
});

Route::get('/medicina', function() {
    return view('app.medicine');
});

Route::get('/about', function() {
    return view('app.about');
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
