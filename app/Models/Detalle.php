<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    /** @use HasFactory<\Database\Factories\DetalleFactory> */
    use HasFactory;

    public function pedido(){
        return $this->belongsTo(Pedido::class);//pertnece a un pedido
    }

    protected $fillable = [
        'producto_id',
        'nombre',
        'precio',
        'imagen',
        'cantidad',
        'pedido_id'
    ];
}
