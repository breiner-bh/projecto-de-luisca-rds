<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FuncionesCargoTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
    public function test_funcines_cargo_index(): void
    {
        $response = $this->get('/funcionescargo');
        $response->assertStatus(404);
    }
    public function test_funciones_cargo_create(): void
    {
        $response = $this->get('/funcionescargo/create');
        $response ->assertStatus(404);
    }
    public function test_funciones_cargo_store(): void
    {
        $response = $this->post('funcionescargo', [
            'funcion'=>fake()->text(50),
            'descripcion'=>fake()->numberBetween(1,10)
        ]);
        $response->assertStatus(404);
    }
    public function test_funciones_cargo_show(): void
    {
        $response =$this->get('/funcionescargo/1');
        $response ->assertStatus(404);
    }
    public function test_funciones_cargo_edit(): void
    {
        $response = $this->get('/funcionescargo/1/edit');
        $response ->assertStatus(404);
    }
    public function test_funciones_cargo_update(): void
    {
        $response = $this->put('/funcionescargo/1', [
            'funciones'=>fake()->text(50),
            'descripcion'=>fake()->numberBetween(1,10)
        ]);
        $response->assertStatus(404);
    }
    public function test_funciones_cargo_destroy(): void
    {
        $response = $this->delete('/funcionescargo/1');
        $response->assertStatus(404);
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
