<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogoController::class, 'inicio'])->name('inicio');
Route::get('/inicio', [CatalogoController::class, 'inicio'])->name('inicio');
Route::get('/lista', [CatalogoController::class, 'listado_peliculas'])->name('listado_peliculas');
Route::get('/agregar', [CatalogoController::class, 'agregar'])->name('agregar');
Route::get('/editar', [CatalogoController::class, 'editar'])->name('editar');
