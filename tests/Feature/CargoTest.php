<?php

namespace Tests\Feature;
use App\Models\Cargo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CargoTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user, 'sanctum');
    }
    public function  test_puedes_crear_cargo()
    {
       $datos = [
        'nombre_cargo' => fake()->FirstName(),
        'descripcion' => fake()->text()
       ];
       $this->postJson('/api/cargos', $datos );
       $this->assertDatabaseHas('cargos', $datos);
    }
    public function test_puedes_listar_cargo()
    {
        Cargo::factory()->count(30)->create();
        $response = $this->getjson('api/cargos');
        $response ->assertStatus(200);
    }
    public function test_puedes_ver_cargo()
    {
        $cargo = Cargo::factory()->create();
        $response = $this->getJson('/api/cargos/' .$cargo->id);
        $response -> assertStatus(200);
    }
    public function test_puedes_actualizar_cargo()
    {
        $cargo = Cargo::factory()->create();
        $response = $this->putJson('/api/cargos/' .$cargo->id,[
            'nombre_cargo'=>fake()->firstName(),
            'descripcion'=>fake()->text()
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('cargos',[
            'nombre_cargo'=>$cargo->nombre_cargo,
            'descripcion'=>$cargo->descripcion
        ]);
    }
    public function test_puedes_eliminar_cargo()
    {
        $cargo = Cargo::factory()->create();
        $response = $this->deleteJson('api/cargos/' .$cargo->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('cargos',[
            'nombre_cargo'=>$cargo->nombre_cargo,
            'descripcion'=>$cargo->descripcion
        ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
