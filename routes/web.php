<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_usuario', [LoginController::class, 'login_usuario'])->name('login_usuario');
Route::get('/cerrar_sesion', [loginController::class, 'cerrar_sesion'])->name('cerrar_sesion');

Route::get('/registro', [RegistroController::class, 'registro'])->name('registro');
Route::post('/insertar_usuario', [RegistroController::class, 'insertar_usuario'])->name('insertar_usuario');

Route::get('/', [CatalogoController::class, 'inicio'])->name('inicio');
Route::get('/inicio', [CatalogoController::class, 'inicio'])->name('inicio');

Route::get('/lista', [CatalogoController::class, 'listado_peliculas'])->name('listado_peliculas');
Route::get('/agregar', [CatalogoController::class, 'agregar'])->name('agregar');
Route::get('/editar/{id}', [CatalogoController::class, 'editar'])->name('editar');
Route::put('/edicion/{pelicula}', [CatalogoController::class, 'actualizar'])->name('actualizar');
Route::post('/insertar', [CatalogoController::class, 'insertar_pelicula'])->name('insertar');
Route::get('/eliminar/{id}', [CatalogoController::class, 'eliminar_pelicula'])->name('eliminar');
