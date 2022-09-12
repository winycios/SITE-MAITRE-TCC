<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\FotoRestaurante;
use App\Models\Restaurante;

class FotoRestauranteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FotoRestaurante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'descFoto' => $this->faker->word,
            'restaurante_id' => Restaurante::factory(),
        ];
    }
}
