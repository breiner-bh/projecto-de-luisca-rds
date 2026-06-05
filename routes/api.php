<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FuncionesCargoController;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route ::apiResource('empleados', EmpleadoController:: class);
Route ::apiResource('cargos',CargoController::class);
Route::apiResource('funcionesCargo',FuncionesCargoController::class);
