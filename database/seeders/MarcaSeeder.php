<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $descp = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
      Vestibulum eleifend congue velit non condimentum. Fusce at imperdiet 
      sem, quis commodo eros. Proin malesuada ex id lectus blandit, ut volutpat augue.';
      //
      Marca::create([
          'nombre' => 'Pollos Margarita',
          'slug' => Str::slug('Pollos Margarita'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Tejidos Ancestrales',
          'slug' => Str::slug('Tejidos Ancestrales'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Harukuna',
          'slug' => Str::slug('Harukuna'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Abarrotes Festival',
          'slug' => Str::slug('Abarrotes Festival'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Hortalizas Luchito',
          'slug' => Str::slug('Hortalizas Luchito'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Doña Amanda',
          'slug' => Str::slug('Doña Amanda'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Casalac',
          'slug' => Str::slug('Casalac'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Santa Lucia',
          'slug' => Str::slug('Santa Lucia'),
          'descripcion' => $descp,
        ]);
      Marca::create([
          'nombre' => 'Accesorios Gero',
          'slug' => Str::slug('Accesorios Gero'),
          'descripcion' => $descp,
        ]);
    }
}
