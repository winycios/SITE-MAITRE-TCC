<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\User;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'endereco' => $this->faker->word,
            'estado' => $this->faker->word,
            'bairro' => $this->faker->word,
            'cidade' => $this->faker->word,
            'numero' => $this->faker->numberBetween(-10000, 10000),
            'cpf' => $this->faker->word,
            'cep' => $this->faker->word,
            'user_id' => User::factory(),
        ];
    }
}
