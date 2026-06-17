<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_cargo' => ['required', 'string', 'max:350','unique:cargos'],
            'descripcion' => ['required', 'string', 'max:350','unique:cargos'],
            [
                'nombre_cargo.unique'=>'No se puede dupliacar el nombre de cargo',
                'descripcion.unique' =>'NO se puede duplicar la descripcion del cargo'
            ]
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
        return response()->json([
            'success' => true,
            'message' => 'Lista de los cargos',
            'data' => Cargo::paginate(5)
        ], 200);
    }
    public function show(Cargo $cargo)
    {
        return response()->json([
            'succes' => true,
            'message' => 'Cargo encontrado',
            'data' => $cargo
        ], 200);
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
            'message' => 'Cargo actualizado con exitosamento.',
            'data' => $cargo
        ], 200);
    }
    public function destroy( int $id)
    {
        $cargo = Cargo::find($id);
        if (is_null($cargo)){
            return response()->json([
                'success' => true,
                'message' => 'El cargo que esta buscando no existe.',
                'data' => $cargo
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
