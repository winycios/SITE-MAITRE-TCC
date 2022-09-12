<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pratos;
use App\Models\Restaurante;

class PratosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pratos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'descPrato' => $this->faker->word,
            'valor' => $this->faker->randomFloat(0, 0, 9999999999.),
            'restaurante_id' => Restaurante::factory(),
        ];
    }
}
