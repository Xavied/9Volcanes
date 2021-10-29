<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Imagenes;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Producto::factory(50)
      ->create()
      ->each(function (Producto $producto) {
        Imagenes::factory(4)->create([
          'imageable_id' => $producto->id,
          'imageable_type' => Producto::class,
        ]);
      });
    }
}
