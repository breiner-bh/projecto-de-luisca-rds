<?php

namespace Tests\Feature;
use App\Models\Empleado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpleadoTest extends TestCase 
{
    use RefreshDatabase;
    public function test_crear_empleado()
    {
        $this->postjson('/api/empleados',[
            'nombre'=>'Breiner',
            'apellido'=>'Bermudez',
            'fecha_de_nacimiento'=>'2003-06-24',
            'fecha_de_ingreso'=>'2026-07-15',
            'salario'=>3000000,
            'estado'=>'activo',
            'id_cargo'=>1
        ]);
        $this->assertDatabaseHas('empleados', [
            'nombre' => 'Breiner',
            'apellido' => 'Bermudez',
            'fecha_de_nacimiento' => '2003-06-24',
            'fecha_de_ingreso' => '2026-07-15',
            'salario' => 3000000,
            'estado' => 'activo',
            'id_cargo' => 1
        ]);
    }
}
