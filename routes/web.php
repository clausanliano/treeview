<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::post('categoria', [CategoriaController::class, 'store'])->name('categoria.store');

