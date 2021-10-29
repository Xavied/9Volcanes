<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->sentence(2);
        $marca_id = Marca::all()->random();
        $categoria_id = Categoria::all()->random();

        return [
        'nombre' => $nombre,
        'slug' => Str::slug($nombre),
        'descripcion' => $this->faker->text(),
        'precio' => $this->faker->randomElement([9.99, 19.99, 54.99, 99.99]),
        'categoria_id' => $categoria_id->id,
        'marca_id' => $marca_id->id,
        'cantidad' => $this->faker->randomElement([
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
        
        ]),
        'visible' => $this->faker->boolean(),
        ];       
    }
}
