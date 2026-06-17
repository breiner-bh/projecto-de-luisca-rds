<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleado>
 */
class EmpleadoFactory extends Factory 
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
            'apellido'=>fake()->lastName(),
            'fecha_de_nacimiento'=>fake()->date(),
            'fecha_de_ingreso'=>fake()->date(),
            'salario'=>3000000,
            'estado'=>'activo',
            'id_cargo'=>1  
        ];
    }
    
}
