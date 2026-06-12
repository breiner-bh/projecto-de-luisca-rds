<?php

namespace Database\Factories;

use App\Models\FuncionCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<=funcionCargo>
 */
class FuncionesCargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstName(),
            'descripcion'=>fake()->text()
        ];
    }
}
