<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categorium;
use App\Models\Restaurante;
use App\Models\User;

class RestauranteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'bairro' => $this->faker->word,
            'cidade' => $this->faker->word,
            'estado' => $this->faker->word,
            'foto' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'cardapio' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'cep' => $this->faker->word,
            'numero' => $this->faker->numberBetween(-10000, 10000),
            'categoria_id' => Categorium::factory(),
            'user_id' => User::factory(),
        ];
    }
}
