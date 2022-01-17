<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Imagenes;
use App\Models\Marca;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
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
      
    //MARCA ID 1; CATEGORIA ID 8
        Producto::create([
          'nombre' => 'Empaque de Alas de Pollo',
          'slug' => Str::slug('Empaque de Alas de Pollo'),
          'descripcion' => $descp,
          'precio' => 1.99,
          'categoria_id' => 8,
          'marca_id' => 1,
          'cantidad' => 10,
          'visible' => true,
        ]);

      Producto::create([
        'nombre' => 'Empaque de Piernas de Pollo',
        'slug' => Str::slug('Empaque de Piernas de Pollo'),
        'descripcion' => $descp,
        'precio' => 1.99,
        'categoria_id' => 8,
        'marca_id' => 1,
        'cantidad' => 20,
        'visible' => true,
         ]);
        Producto::create([
          'nombre' => 'Pechugas + Alas + Piernas',
          'slug' => Str::slug('Pechugas + Alas + Piernas'),
          'descripcion' => $descp,
          'precio' => 5.99,
          'categoria_id' => 8,
          'marca_id' => 1,
          'cantidad' => 10,
          'visible' => true,
        ]);
    //marca id 2; categria id 13
      Producto::create([
        'nombre' => 'Camiseta bordada talla L',
        'slug' => Str::slug('Camiseta bordada talla L'),
        'descripcion' => $descp,
        'precio' => 24.99,
        'categoria_id' => 13,
        'marca_id' => 2,
        'cantidad' => 10,
        'visible' => true,
        ]);
    //
    Producto::create([
      'nombre' => 'Bufanda',
      'slug' => Str::slug('Bufanda'),
      'descripcion' => $descp,
      'precio' => 9.99,
      'categoria_id' => 13,
      'marca_id' => 2,
      'cantidad' => 15,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Chaqueta',
      'slug' => Str::slug('Chaqueta'),
      'descripcion' => $descp,
      'precio' => 29.99,
      'categoria_id' => 13,
      'marca_id' => 2,
      'cantidad' => 12,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Sandalias y Pantalón',
      'slug' => Str::slug('Sandalias y Pantalón'),
      'descripcion' => $descp,
      'precio' => 24.99,
      'categoria_id' => 13,
      'marca_id' => 2,
      'cantidad' => 15,
      'visible' => true,
      ]);
    // HARUKUNA MARCA ID 3; FRUTAS Y VERDURAS CATEGORIA ID 3
    Producto::create([
      'nombre' => 'Empaque de 1 kg de Manzanas',
      'slug' => Str::slug('Empaque de 1 kg de Manzanas'),
      'descripcion' => $descp,
      'precio' => 1.99,
      'categoria_id' => 3,
      'marca_id' => 3,
      'cantidad' => 13,
      'visible' => true,
      ]);
    Producto::create([
      'nombre' => 'Empaque de 1 kg de Mandarinas',
      'slug' => Str::slug('Empaque de 1 kg de Mandarinas'),
      'descripcion' => $descp,
      'precio' => 1.99,
      'categoria_id' => 3,
      'marca_id' => 3,
      'cantidad' => 10,
      'visible' => true,
      ]);
    Producto::create([
      'nombre' => 'Empaque de 1 kg de Tomates',
      'slug' => Str::slug('Empaque de 1 kg de Tomates'),
      'descripcion' => $descp,
      'precio' => 2.99,
      'categoria_id' => 3,
      'marca_id' => 3,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Empaque de 1kg de kiwi',
      'slug' => Str::slug('Empaque de 1kg de kiwi'),
      'descripcion' => $descp,
      'precio' => 1.99,
      'categoria_id' => 3,
      'marca_id' => 3,
      'cantidad' => 12,
      'visible' => true,
      ]);

    //Abarrotes Festival marca id 4; Otro Categoria id 13
    Producto::create([
      'nombre' => 'Paquete de condimientos y especias para comida',
      'slug' => Str::slug('Empaque de condimientos para comida'),
      'descripcion' => $descp,
      'precio' => 3.99,
      'categoria_id' => 13,
      'marca_id' => 4,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Paquete de gelatinas y mermeladas de varios sabores',
      'slug' => Str::slug('Paquete de gelatinas y mermeladas de varios sabores'),
      'descripcion' => $descp,
      'precio' => 4.99,
      'categoria_id' => 13,
      'marca_id' => 4,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Paquete con sopas en sobre',
      'slug' => Str::slug('Paquete con sopas en sobre'),
      'descripcion' => $descp,
      'precio' => 3.99,
      'categoria_id' => 13,
      'marca_id' => 4,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //Dona Amanda marca id 6; Panaderia y resposteria categoria id 7 
    Producto::create([
      'nombre' => 'Pastel de tres leches',
      'slug' => Str::slug('Pastel de tres leches'),
      'descripcion' => $descp,
      'precio' => 5.99,
      'categoria_id' => 7,
      'marca_id' => 6,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Pastel confitado de chocolate',
      'slug' => Str::slug('Pastel confitado de chocolate'),
      'descripcion' => $descp,
      'precio' => 14.99,
      'categoria_id' => 7,
      'marca_id' => 6,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Flan con gelatina',
      'slug' => Str::slug('Flan con gelatina'),
      'descripcion' => $descp,
      'precio' => 1,
      'categoria_id' => 7,
      'marca_id' => 6,
      'cantidad' => 5,
      'visible' => true,
      ]);
    //Santa Lucia marca id 8; Harinas categorias id 6 
    Producto::create([
      'nombre' => 'Harina Fortificada de Trigo',
      'slug' => Str::slug('Harina Fortificada de trigo'),
      'descripcion' => $descp,
      'precio' => 4.99,
      'categoria_id' => 6,
      'marca_id' => 8,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Premezcla para Brownies',
      'slug' => Str::slug('Premezcla para Brownies'),
      'descripcion' => $descp,
      'precio' => 6.99,
      'categoria_id' => 6,
      'marca_id' => 8,
      'cantidad' => 12,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Premezcla para Torta de chocolate sin azucar',
      'slug' => Str::slug('Premezcla para Torta de chocolate sin azucar'),
      'descripcion' => $descp,
      'precio' => 6.99,
      'categoria_id' => 6,
      'marca_id' => 8,
      'cantidad' => 8,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Harina Fortificada Integral',
      'slug' => Str::slug('Harina Fortificada Integral'),
      'descripcion' => $descp,
      'precio' => 6.99,
      'categoria_id' => 6,
      'marca_id' => 8,
      'cantidad' => 10,
      'visible' => true,
      ]);
    // Casalac marca id 7, Lacteos categoria id 1
    Producto::create([
      'nombre' => 'Paquete de Queso Cheddar',
      'slug' => Str::slug('Paquete de Queso Cheddar'),
      'descripcion' => $descp,
      'precio' => 1.99,
      'categoria_id' => 1,
      'marca_id' => 7,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Paquete de Queso Gouda',
      'slug' => Str::slug('Paquete de Queso Gouda'),
      'descripcion' => $descp,
      'precio' => 2.99,
      'categoria_id' => 1,
      'marca_id' => 7,
      'cantidad' => 12,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Empaque de leche',
      'slug' => Str::slug('Empaque de leche'),
      'descripcion' => $descp,
      'precio' => 3.99,
      'categoria_id' => 1,
      'marca_id' => 7,
      'cantidad' => 10,
      'visible' => true,
      ]);
    //
    Producto::create([
      'nombre' => 'Paquete de Yogur',
      'slug' => Str::slug('Paquete de Yogur'),
      'descripcion' => $descp,
      'precio' => 2.99,
      'categoria_id' => 1,
      'marca_id' => 7,
      'cantidad' => 5,
      'visible' => true,
      ]);
  }
} 
