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
            $table->id();
            $table->string('nombre')->nullable(true)->unique();
            $table->string('apellido')->nullable(true)->unique();
            $table->date('fecha_de_nacimiento')->nullable(true);
            $table->date('fecha_de_ingreso')->nullable(true);
            $table->decimal('salario',10,2)->nullable(true);
            $table->string('estado')->nullable(true);
            $table->unsignedBigInteger('id_cargo')->nullable(true);
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
