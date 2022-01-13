<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      Categoria::create([
          'nombre' => 'Lacteos',
          'slug' => Str::slug('Lacteos'),
        ]);
      Categoria::create([
          'nombre' => 'Bebidas',
          'slug' => Str::slug('Bebidas'),
        ]);
      Categoria::create([
          'nombre' => 'Frutas y verduras',
          'slug' => Str::slug('Frutas y verduras'),
        ]);
      Categoria::create([
          'nombre' => 'Productos secos',
          'slug' => Str::slug('Productos secos'),
        ]);
      Categoria::create([
          'nombre' => 'Snacks y confitería',
          'slug' => Str::slug('Snacks y confitería'),
        ]);
      Categoria::create([
          'nombre' => 'Harinas',
          'slug' => Str::slug('Harinas'),
        ]);
      Categoria::create([
        'nombre' => 'Panadería y repostería',
        'slug' => Str::slug('Panadería y repostería'),
      ]);
      Categoria::create([
        'nombre' => 'Pollo y carnes',
        'slug' => Str::slug('Pollo y carnes'),
      ]);
      Categoria::create([
        'nombre' => 'Embutidos',
        'slug' => Str::slug('Embutidos'),
      ]);
      Categoria::create([
        'nombre' => 'Huevos',
        'slug' => Str::slug('Huevos'),
      ]);
      Categoria::create([
        'nombre' => 'Mascotas',
        'slug' => Str::slug('Mascotas'),
      ]);
      Categoria::create([
        'nombre' => 'Mariscos y pescados',
        'slug' => Str::slug('Mariscos y pescados'),
      ]);
      Categoria::create([
        'nombre' => 'Moda',
        'slug' => Str::slug('Moda'),
      ]);
      Categoria::create([
        'nombre' => 'Tecnología',
        'slug' => Str::slug('Tecnología'),
      ]);
      Categoria::create([
        'nombre' => 'Otro',
        'slug' => Str::slug('otro'),
      ]);
      Categoria::create([
        'nombre' => 'Promociones',
        'slug' => Str::slug('Promociones'),
      ]);
    }
}
