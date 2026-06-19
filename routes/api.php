<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FuncionesCargoController;
use App\Models\Empleado;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route ::apiResource('empleados', EmpleadoController:: class)->middleware('auth:sanctum');
Route ::apiResource('cargos',CargoController::class)->middleware('auth:sanctum');
Route::apiResource('FuncionesCargo',FuncionesCargoController::class)->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');