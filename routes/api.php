<?php

use App\Http\Controllers\EmpleadoController;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route ::apiResource('Empleados', EmpleadoController:: class);