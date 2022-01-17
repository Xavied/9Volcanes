<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Imagenes;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //MARCA ID 1; CATEGORIA ID 8
        Imagenes::create([
            'url' =>'productos/AlasdePollo.jpg',
            'imageable_id' => 1,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/PiernasdePollo.jpg',
            'imageable_id' => 2,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/PechugaPiernaAla.jpg',
            'imageable_id' => 3,
            'imageable_type' => Producto::class,
          ]);
          //marca id 2; categria id 13
          Imagenes::create([
            'url' =>'productos/CamisetaBordadaL.jpg',
            'imageable_id' => 4,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/BufandaTejida.jpg',
            'imageable_id' => 5,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/Chaqueta.jpg',
            'imageable_id' => 6,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/SandaliasPantalon.jpg',
            'imageable_id' => 7,
            'imageable_type' => Producto::class,
          ]);
          // HARUKUNA MARCA ID 3; FRUTAS Y VERDURAS CATEGORIA ID 3
          Imagenes::create([
            'url' =>'productos/Manzanas.jpg',
            'imageable_id' => 8,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/Mandarinas.jpg',
            'imageable_id' => 9,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/Tomates.jpg',
            'imageable_id' => 10,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/Kiwi.jpg',
            'imageable_id' => 11,
            'imageable_type' => Producto::class,
          ]);
          //Abarrotes Festival marca id 4; Otro Categoria id 13
          Imagenes::create([
            'url' =>'productos/Condimentos.jpg',
            'imageable_id' => 12,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/MermeladaGelatina.jpg',
            'imageable_id' => 13,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/SopaSobre.jpg',
            'imageable_id' => 14,
            'imageable_type' => Producto::class,
          ]);
           //Dona Amanda marca id 6; Panaderia y resposteria categoria id 7 
          Imagenes::create([
            'url' =>'productos/Paster3Leches.jpg',
            'imageable_id' => 15,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/PastelChocolate.jpg',
            'imageable_id' => 16,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/FlanGelatina.jpg',
            'imageable_id' => 17,
            'imageable_type' => Producto::class,
          ]);
          //Santa Lucia marca id 8; Harinas categorias id 6 
          Imagenes::create([
            'url' =>'productos/HarinaTrigoSL.png',
            'imageable_id' => 18,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/PremezclaBrowSL.png',
            'imageable_id' => 19,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/PremezclaPastelSL.png',
            'imageable_id' => 20,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/HarinaIntegralSL.png',
            'imageable_id' => 21,
            'imageable_type' => Producto::class,
          ]);
          // Casalac marca id 7, Lacteos categoria id 1
          Imagenes::create([
            'url' =>'productos/EmpaqueLeche.png',
            'imageable_id' => 22,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/PaqueteYogur.jpg',
            'imageable_id' => 23,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/QuesoGouda.jpg',
            'imageable_id' => 24,
            'imageable_type' => Producto::class,
          ]);
          Imagenes::create([
            'url' =>'productos/QuesoCheddar.jpg',
            'imageable_id' => 25,
            'imageable_type' => Producto::class,
          ]);

    }
}
