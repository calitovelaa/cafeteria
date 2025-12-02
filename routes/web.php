<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/generarPedido', 
[PedidoController::class, 'getOrdenado'])->name('generarPedido');

Route::get('/agregarProducto/{id}', 
[PedidoController::class, 'agregarProducto']);

Route::get('/ordenarProductos', 
[ProductoController::class, 'getProductos'])->name('ordenarProductos');

Route::get('/ordenadoMas/{id}', 
[PedidoController::class, 'masCantidad']);

Route::get('/ordenadoMenos/{id}',
 [PedidoController::class, 'menosCantidad']);

 Route::post('/grabarPedido',
 [PedidoController::class, 'grabarPedido']);
 
Route::get('/verPedidos', [PedidoController::class, 'verPedidos'])->name('verPedidos');
Route::delete('/eliminarPedido/{id}', [PedidoController::class, 'eliminarPedido'])->name('eliminarPedido');