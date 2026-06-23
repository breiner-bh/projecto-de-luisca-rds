<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\validator;
use App\Models\FuncionesCargo;
use Illuminate\Http\Request;

class FuncionesCargoController extends Controller
{
    public function store(Request $request)
    {
        $datos =[
                'descripcion_funcion' => ['required', 'string', 'max:350', 'unique:funciones_cargos'],
                'estado' => ['required', 'string', 'max:255'],
                'id_cargo' => ['required', 'integer', 'exists:cargos,id'],
            ];
            $messages = [
                'descripcion_funcion.unique' => 'NO se pueden duplicar las funciones.'

            ];
        $validator = Validator::make($request->all(), $datos, $messages);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }
        FuncionesCargo::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Funcion de cargo creada con exito.',
        ], 201);
    }
    public function index()

    {
        $FuncionesCargo = FuncionesCargo::paginate(5);
        if ($FuncionesCargo->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontradon registros de las funciones de cargo',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'lista de las funciones de cargo',
                'data' => $FuncionesCargo
            ], 200);
        }
    }
    public function show(int $id)
    {
        $FuncionesCargo = FuncionesCargo::find($id);
        if (!$FuncionesCargo) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron las funciones de cargo'
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Funcion del cargo encontrada',
                'data' => $FuncionesCargo
            ], 200);
        }
    }
    public function update(Request $request,FuncionesCargo $FuncionesCargo)
    {

        $datos = $request->validate([
            'descripcion_funcion' => ['required', 'string', 'max:255'],
            'estado' => ['required','string','max:255'],
            'id_cargo' => ['required', 'integer', 'exists:cargos,id']
        ]);     
        $FuncionesCargo->update([
            'descripcion_funcion' => $datos['descripcion_funcion'],
            'estado' => $datos['estado'],
            'id_cargo' => $datos ['id_cargo']
        ]);
        if(!$FuncionesCargo)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo realizar la actualizacion de las funciones de cargo.'
                ],404);
            }else {
        return response()->json([
            'success' => true,
            'message' => 'Las funciones cargo fueron actualizado exitosamente.',
            'data' => $FuncionesCargo
        ], 200);
    }
    }
    public function destroy(int $id)
    {
        $funcionesCargo = FuncionesCargo::find($id);
        if (is_null($funcionesCargo)) {
            return response()->json([
                'success' => false,
                'message' => 'Funciones de cargo no registrado o no existente.'
            ], 404);
        } else {
            $funcionesCargo->delete();
            return response()->json([
                'success' => true,
                'menssage' => 'Empleado eliminado exitosamente',
                'data' => $funcionesCargo
            ], 200);
        };
    }
}
