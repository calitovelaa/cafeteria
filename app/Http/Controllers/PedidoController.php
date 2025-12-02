<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordenado;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Detalle;

class PedidoController extends Controller
{

    public function getOrdenado() {
    $ordenado = Ordenado::orderBy('nombre', 'asc')->get();
    return view('generarPedido', compact('ordenado'));
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
    public function masCantidad($id) {
        $ordenado = Ordenado::find($id);
        $ordenado->cantidad = $ordenado->cantidad + 1;
        $ordenado->save();
        return redirect('/generarPedido');
    }

    public function menosCantidad($id) {
        $ordenado = Ordenado::find($id);
        $ordenado->cantidad = $ordenado->cantidad - 1;
        if ($ordenado->cantidad < 1) {
            $ordenado->delete();
        } else {
            $ordenado->save();
        }
        return redirect('/generarPedido');
    }

    public function grabarPedido(Request $request) {
        $pedido = new Pedido();
        $datos = $request->input();
        $pedido->nombre = $datos['nombre'];
        $pedido->origen = $datos['origen'];
        $pedido->fecha = now();
        $pedido->total = $datos['total'];
        $pedido->save();

        $ordenado = Ordenado::orderBy('nombre', 'asc')->get();
        foreach ($ordenado as $ordenados) {
            $detalle = new Detalle();
            $detalle->producto_id = $ordenados->producto_id;
            $detalle->nombre = $ordenados->nombre;
            $detalle->precio = $ordenados->precio;
            $detalle->imagen = $ordenados->imagen;
            $detalle->cantidad = $ordenados->cantidad;
            $detalle->pedido_id = $pedido->id;
            $detalle->save();
        }
        foreach ($ordenado as $ordenados) {
            $ordenados->delete();
        }
        return redirect('/generarPedido');
    }
}