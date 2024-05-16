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
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/adminPanel', 'admin')->middleware('auth', 'admin')->name('adminPanel');

    Route::get('/juego1', function () {
        return view('juegos1.juego1');
    })->name('Juego1');

    Route::get('/juego2', function () {
        return view('juegos2.juegos2');
    })->name('Juego2');

    Route::get('/juego3', function () {
        return view('juegos3.juego3');
    })->name('Juego3');

    Route::get('/cursos', function () {
        return view('cursos');
    })->name('Cursos');

});
