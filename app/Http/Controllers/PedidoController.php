<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordenado;

class PedidoController extends Controller
{

    public function getOrdenado () {
        $ordenado = Ordenado::orderBy('nombre','asc')->get();
        return view('generarPedido', compact('ordenado'));
    }
}
