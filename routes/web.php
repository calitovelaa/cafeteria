<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/pedidos', function () {
    return view('pedidos');
})->name('pedidos');

