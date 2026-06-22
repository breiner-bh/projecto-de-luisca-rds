<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_cargo' => ['required', 'string', 'max:350'],
            'descripcion' => ['required', 'string', 'max:350'],

        ]);
        $Cargo = Cargo::create([
            'nombre_cargo' => $datos['nombre_cargo'],
            'descripcion' => $datos['descripcion']
        ]);
        return response()->json([
            'success' => true,
            'message' => 'El cargo fue creado con exito.',
            'data' => $Cargo
        ], 201);
    }
    public function index()
    {
        $cargo = Cargo::paginate(5);
        if ($cargo->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No se encontradon cargo',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Lista de los cargos',
                'data' => $cargo
            ], 200);
        }
    }
    public function show(int $id)
    {
        $cargo = Cargo::find($id);
        if (!$cargo) {
            return response()->json([
                'success' => false,
                'message' => 'Cargo no encontrado o no se encuentra en existencia.',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Cargo encontrado',
                'data' => $cargo
            ], 200);
        }
    }
    public function update(Request $request, Cargo $cargo)
    {
        $datos = $request->validate([
            'nombre_cargo' => ['required', 'string', 'max:350'],
            'descripcion' => ['required', 'string', 'max:350']
        ]);
        $cargo->update([
            'nombre_cargo' => $datos['nombre_cargo'],
            'descripcion' => $datos['descripcion']
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Cargo actualizado exitosamente.',
            'data' => $cargo
        ], 200);
    }
    public function destroy(int $id)
    {
        $cargo = Cargo::find($id);
        if (is_null($cargo)) {
            return response()->json([
                'success' => false,
                'message' => 'El cargo que esta buscando no existe.'
            ], 404);
        } else {
            $cargo->delete();
            return response()->json([
                'success' => true,
                'message' => 'El fue eliminado con exito.',
                'data' => $cargo
            ], 200);
        }
    }
}
