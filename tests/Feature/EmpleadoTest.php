<?php

namespace Tests\Feature;
use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class EmpleadoTest extends TestCase 
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user, 'sanctum');
    }
    public function test_crear_empleado()
    {
        $this->postjson('/api/empleados',[
            'nombre'=>'Breiner',
            'apellido'=>'Bermudez',
            'fecha_de_nacimiento'=>'2003-06-24',
            'fecha_de_ingreso'=>'2026-07-15',
            'salario'=>fake()->numberBetween(1000000,5000000),
            'estado'=>Arr::random('activo','inactivo'),
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
    public function test_puede_listar_empleados()
    {
        Empleado::factory()->count(30)->create();
        $response = $this->getjson('api/empleados');
        $response->assertStatus(200);
    }
    public function test_puede_ver_un_empleado()
    {
        $empleado = Empleado::factory()->create();
        $response = $this->getjson('api/empleados/'.$empleado->id);
        $response->assertStatus(200);
    }
    public function test_puede_actualizar_un_empleado()
    {
        $empleado = Empleado::factory()->create();
        $response = $this->putjson('api/empleados/'.$empleado->id, [
            'nombre'=>fake()->firstName(),
            'apellido'=>fake()->lastName(),
            'fecha_de_nacimiento'=>fake()->date(),
            'fecha_de_ingreso'=>fake()->date(),
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
    public function test_puedes_eliminar_empleado()
    {
        $empleado = Empleado::factory()->create();
        $response = $this->deleteJson('api/empleados/' .$empleado->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('empleados',[
            'nombre'=>$empleado-> nombre,
            'apellido'=>$empleado->apellido,
            'fecha_de_nacimiento'=>$empleado->fecha_de_nacimiento,
            'fecha_de_ingreso'=>$empleado->fecha_de_ingreso,
            'salario'=>$empleado->salario,
            'estado'=>$empleado->estado,
            'id_cargo'=>$empleado->id_cargo
        ]);

    }
}
