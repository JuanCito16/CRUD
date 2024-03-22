<?php

use App\Http\Controllers\PersonasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonasController::class, 'index'])->name('personas.index');
Route::post('/store', [PersonasController::class, 'store'])->name('personas.store');
Route::put('/update/{persona}', [PersonasController::class, 'update'])->name('personas.update'); 
Route::get('/delete/{id}', [PersonasController::class, 'delete'])->name('personas.delete');
