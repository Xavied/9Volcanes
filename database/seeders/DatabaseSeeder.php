<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('public/productos');

        Storage::makeDirectory('public/productos');
        $this->call([
            UserSeeder::class,
            CategoriaSeeder::class,
            MarcaSeeder::class,
            ProductoSeeder::class,           
            ProvinciaSeeder::class, 
          ]);
    }
}
