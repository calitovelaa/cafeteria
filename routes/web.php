<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/agregarProducto/{id}', [PedidoController::class, 'agregarProducto'])->name('agregarProducto');

Route::get('/ordenarProductos', [ProductoController::class, 'getProductos'])->name('ordenarProductos');

Route::get('/ordenadoMas/{id}', [PedidoController::class, 'masCantidad'])->name('ordenadoMas');

Route::get('/ordenadoMenos/{id}', [PedidoController::class, 'menosCantidad'])->name('ordenadoMenos');
