<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mesa;
use App\Models\MesaReserva;
use App\Models\Reserva;

class MesaReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MesaReserva::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reserva_id' => Reserva::factory(),
            'mesa_id' => Mesa::factory(),
        ];
    }
}
