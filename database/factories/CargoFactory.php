<?php

namespace Database\Factories;
use App\Models\Cargo;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cargo::class;
    public function definition(): array
    {
        return [
            'nombre_cargo'=>fake()->firstName(),
            'descripcion'=>fake()->text()
        ];
    }
}
