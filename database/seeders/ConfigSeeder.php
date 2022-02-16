<?php

namespace Database\Seeders;


use App\Models\direccionTienda;
use App\Models\numeroTelefono;
use Illuminate\Database\Seeder;
use App\Models\Config;
use Illuminate\Support\Str;


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
        Config::create([
            'titulo' => 'Sobre la Web',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec lorem eu risus imperdiet viverra consequat id lorem. Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.',
          ]);
        Config::create([
            'titulo' => 'Contactos',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec lorem eu risus imperdiet viverra consequat id lorem. Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.',
          ]);
    }
}
