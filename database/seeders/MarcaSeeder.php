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
        //
        Marca::create([
            'nombre' => 'Vita',
            'slug' => Str::slug('Vita'),
          ]);
        Marca::create([
            'nombre' => 'Parmalat',
            'slug' => Str::slug('Parmalat'),
          ]);
        Marca::create([
            'nombre' => 'Oreo',
            'slug' => Str::slug('Oreo'),
          ]);
        Marca::create([
            'nombre' => 'Festival',
            'slug' => Str::slug('Festival'),
          ]);
        Marca::create([
            'nombre' => 'Coca Cola',
            'slug' => Str::slug('Coca Cola'),
          ]);
        Marca::create([
            'nombre' => 'Pepsi',
            'slug' => Str::slug('Pepsi'),
          ]);
        Marca::create([
            'nombre' => 'YA',
            'slug' => Str::slug('YA'),
          ]);
        Marca::create([
            'nombre' => 'Santa Lucia',
            'slug' => Str::slug('Santa Lucia'),
          ]);
        Marca::create([
            'nombre' => 'Getilver',
            'slug' => Str::slug('Getilver'),
          ]);
    }
}
