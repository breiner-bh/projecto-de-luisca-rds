<?php

namespace Database\Seeders;
use App\Models\Cargo;
use App\Models\FuncionesCargo;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CargoSeeder;
use Database\Seeders\FuncionesCargoSeeder;
use Database\Seeders\EmpleadoSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            CargoSeeder::class,
            FuncionesCargoSeeder::class,
            EmpleadoSeeder::class
        ]);
    }
}
