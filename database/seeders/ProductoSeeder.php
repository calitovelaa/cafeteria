<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Producto::create([
            'nombre' => 'Sandwich',
            'precio' => 45,
            'imagen' => 'sandwich.jpg',
        ]);
        Producto::create([
            'nombre' => 'Tacos',
            'precio' => 60,
            'imagen' => 'tacosBis.jpg',
        ]);
        Producto::create([
            'nombre' => 'Huevos al gusto',
            'precio' => 70,
            'imagen' => 'huevos.jpg',
        ]);
        Producto::create([
            'nombre' => 'Molletes',
            'precio' => 50,
            'imagen' => 'molletes.jpg',
        ]);
        Producto::create([
            'nombre' => 'Tostadas',
            'precio' => 60,
            'imagen' => 'tostadas.jpg',
        ]);
    }

    }

