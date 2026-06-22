<?php

namespace Tests;
use App\Models\Empleado;
use illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //
}
class Empleadotest extends TestCase
{
   public function Test_puede_crear_empleado()
    {
        $reponse = $this->postJson('/api/empleados',[
            'nombre'=>'Breiner',
            'apellido'=>'Bermudez',
            'fecha_de_nacimiento'=>'2003-06-24',
            'fecha_de_ingreso'=>'2026-07-15',
            'salario'=>30000,
            'estado'=>'activo',
            'id_cargo'=>1
        ]);
        $reponse->assertStatus(201);
    }

    public function Test_crear_empleados()
    {
        $this->postJson('/api/empleados',[
            'nombre'=>fake()->lastName(),
            'apellido'=>fake()->firstName(),
            'fecha_de_nacimiento'=>fake()->date(),
            'fecha_de_ingreso'=>fake()->date(),
            'salario'=>fake()->numberBetween(1000000,5000000),
            'estado'=>fake()->randomElement(['activo','inactivo']),
            'id_cargo'=>1
        ]);
        $this->assertDatabaseHas(
            'empleados',[
                'nombre'=>'Breiner'
        ]);
    }
}