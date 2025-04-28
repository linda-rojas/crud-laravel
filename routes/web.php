<?php

use App\Http\Controllers\LibrosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros/create', [LibrosController::class, 'create'])->name('libros.create');

Route::post('/libros/store', [LibrosController::class, 'store'])->name('libros.store');

Route::get('/libros/show', [LibrosController::class, 'show'])->name('libros.show');

Route::put('/libros/{libro}', [LibrosController::class, 'update'])->name('libros.update');

Route::get('/libros/delete', [LibrosController::class, 'delete'])->name('libros.delete');
Route::delete('/libros/{libro}', [LibrosController::class, 'destroy'])->name('libros.destroy');
