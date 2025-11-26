<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenado extends Model
{
    /** @use HasFactory<\Database\Factories\OrdenadoFactory> */
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'nombre',
        'precio',
        'imagen',
        'cantidad',
    ];
}
