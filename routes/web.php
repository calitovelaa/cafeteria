<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/ordenarProductos', [ProductoController::class, 'getProductos'])->name('ordenarProductos');

Route::get('/generarPedido', [PedidoController::class, 'getOrdenado']);
