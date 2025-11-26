<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordenado;
use App\Models\Producto;
use App\Models\Pedido;

class PedidoController extends Controller
{

    public function getOrdenado () {
    $ordenados = Ordenado::orderBy('nombre','asc')->get();
    return view('generarPedido',compact('ordenado'));
    }

    public function agregarProducto ($id) {
       $ordenado = new Ordenado();   
       $producto = Producto::find($id);
       $ordenado->producto_id = $producto->id;
       $ordenado->nombre = $producto->nombre;
       $ordenado->precio = $producto->precio;
       $ordenado->imagen = $producto->imagen;
       $ordenado->cantidad = 1;
       $ordenado->save();
       return redirect('/ordenarProductos');
   }
}
