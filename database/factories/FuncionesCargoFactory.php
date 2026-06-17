<?php

namespace Database\Factories;

use App\Models\FuncionCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<=funcionesCargo>
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
            'descripcion_funcion'=>fake()->text(),
            'estado'=>fake()->randomElement(['activo','inactivo']),
            'id_cargo'=>fake()->numberBetween(1,5)
        ];
    }
}
