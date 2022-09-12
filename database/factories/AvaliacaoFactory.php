<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Avaliacao;
use App\Models\Restaurante;

class AvaliacaoFactory extends Factory
{
    //protected $table = 'avaliacoes';
    protected $model = Avaliacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estrelas' => $this->faker->numberBetween(-10000, 10000),
            'descAvaliacao' => $this->faker->word,
            'restaurante_id' => Restaurante::factory(),
        ];
    }
}
