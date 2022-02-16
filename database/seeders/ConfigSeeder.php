<?php

namespace Database\Seeders;

use App\Models\direccionTienda;
use App\Models\numeroTelefono;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      numeroTelefono::create(['numero_de_telefono' => '0986097821']);
      
      direccionTienda::Create([
                              'latitud'=>'41.4033822',
                              'longitud'=> '2.17403'
                            ]);
    }
}
