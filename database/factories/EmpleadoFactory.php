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
            'fecha_de_ingreso'=>fake()->now(),
            'salario'=>3000000,
            'estado'=>'activo',
            'id_cargo'=>1
        ];
    }
    public function Test_puede_listar_empleados()
    {
        Empleado::factory()->count(10)->create();
        $response = $this->getjson('/api/empleados');
        $response->assertStatus(200);
    }
    public function Test_puede_puede_ver_un_empleado()
    {
        $empleado = Empleado::factory()->create();
        $response = $this->getjson('/api/empleados/'.$empleado->id);
        $response->assertStatus(200);
    }
    public function Test_puede_actualizar_un_empleado()
    {
        $empleado = Empleado::factory()->create();
        $response = $this->putjson('/api/empleados/'.$empleado->id, [
            'nombre'=>fake()->firstName(),
            'apellido'=>fake()->lastName(),
            'fecha_de_nacimiento'=>fake()->date(),
            'fecha_de_ingreso'=>fake()->now(),
            'salario'=>3000000,
            'estado'=>'activo',
            'id_cargo'=>1
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('empleados', [
            'id'=>$empleado->id,
            'nombre'=>$empleado->nombre,
            'apellido'=>$empleado->apellido,
            'fecha_de_nacimiento'=>$empleado->fecha_de_nacimiento,
            'fecha_de_ingreso'=>$empleado->fecha_de_ingreso,
            'salario'=>$empleado->salario,
            'estado'=>$empleado->estado,
            'id_cargo'=>$empleado->id_cargo
        ]);
    }
}
