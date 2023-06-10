<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminInicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarrucelController;

Route::group(['middleware' => 'App\Http\Middleware\AuthAdmin'], function () {
    Route::get('/inicio', [AdminInicioController::class, 'index'])->name('inicio');
    Route::view('/usuario', 'usuario')->name('usuario');
    Route::get('/admin-carrucel', [CarrucelController::class, 'index'])->name('subir.carrucel');
    Route::post('/admin-carrucel/registrar', [CarrucelController::class, 'store'])->name('agregar.carrucel');
    Route::delete('/admin-carrucel/{id}', [CarrucelController::class, 'destroy'])->name('eliminar-carrucel');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/cerrar-sesion', [LoginController::class, 'logout'])->name('cerrar.sesion');
});

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'mi-cuenta')->name('cuenta');
    Route::post('/inicio-sesion', [LoginController::class, 'login'])->name('inicio.sesion');
});
