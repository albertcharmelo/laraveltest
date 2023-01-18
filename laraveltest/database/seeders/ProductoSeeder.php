<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Producto 1',
            'precio' => 123.45,
            'impuesto' => 5,
        ]);

        Producto::create([
            'nombre' => 'Producto 2',
            'precio' => 46.65,
            'impuesto' => 15,
        ]);

        Producto::create([
            'nombre' => 'Producto 3',
            'precio' => 39.73,
            'impuesto' => 12,
        ]);

        Producto::create([
            'nombre' => 'Producto 4',
            'precio' => 250.00,
            'impuesto' => 8,
        ]);

        Producto::create([
            'nombre' => 'Producto 5',
            'precio' => 59.35,
            'impuesto' => 10,
        ]);
    }
}
