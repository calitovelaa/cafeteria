<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/ordenarProductos', [ProductoController::class, 'getProductos'])->name('ordenarProductos');

