<?php

namespace Database\Factories;

use App\Models\Imagenes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagenesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imagenes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'url' =>
            'productos/' .
            $this->faker->image('public/storage/productos', 640, 480, null, false),
        ];
    }
}
