<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarrucelController;

Route::group(['middleware' => 'App\Http\Middleware\AuthAdmin'], function () {
    Route::get('/carrucel', [CarrucelController::class, 'create'])->name('carrucel');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/inicio', 'inicio')->name('inicio');
    Route::view('/usuario', 'usuario')->name('usuario');
    Route::get('/cerrar-sesion', [LoginController::class, 'logout'])->name('cerrar.sesion');

});

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'mi-cuenta')->name('cuenta');
    Route::post('/inicio-sesion', [LoginController::class, 'login'])->name('inicio.sesion');
});
