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
            'nombre' => 'Frutas',
            'slug' => Str::slug('Frutas'),
          ]);
        Categoria::create([
            'nombre' => 'Vegetales',
            'slug' => Str::slug('Vegetales'),
          ]);
        Categoria::create([
            'nombre' => 'Snacks',
            'slug' => Str::slug('Snacks'),
          ]);
        Categoria::create([
            'nombre' => 'Harinas',
            'slug' => Str::slug('Harinas'),
          ]);
    }
}
