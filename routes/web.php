<?php

use App\Http\Controllers\Catalogo;
use Illuminate\Support\Facades\Route;

Route::get('/', [Catalogo::class, 'inicio'])->name('inicio');
Route::get('/inicio', [Catalogo::class, 'inicio'])->name('inicio');
Route::get('/lista', [Catalogo::class, 'listado_peliculas'])->name('listado_peliculas');
Route::get('/agregar', [Catalogo::class, 'agregar'])->name('agregar');
Route::get('/editar', [Catalogo::class, 'editar'])->name('editar');
