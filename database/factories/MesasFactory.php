<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mesas;
use App\Models\Restaurante;

class MesasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mesas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qtdMesas' => $this->faker->numberBetween(-10000, 10000),
            'capMaxima' => $this->faker->numberBetween(-10000, 10000),
            'mesasDisponiveis' => $this->faker->numberBetween(-10000, 10000),
            'restaurante_id' => Restaurante::factory(),
        ];
    }
}
