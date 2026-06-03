<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nombre')->nullable(true);
            $table->string('apellido')->nullable(true);
            $table->date('fecha_de_nacimiento')->nullable(true);
            $table->date('fecha_de_ingreso')->nullable(true);
            $table->boolean('salario')->nullable(true);
            $table->string('estado')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
