<?php

namespace App\Http\Controllers;
use App\Models\FuncionesCargo;
use Illuminate\Http\Request;

class FuncionesCargoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'descripcion_funcion' =>['required','string','max:350','unique:funciones\_cargo'],
            'estado' => ['required','string','max:255'],
            'id_cargo' => ['required','integer','exists:cargos'],
            [
                'descripcion_funcion.unique'=>'NO se pueden duplicar las funciones.'
            ]
        ]);
        $FuncionesCargo = FuncionesCargo::create([
            'descripcion_funcion'=>$datos ['descripcion_funcion'],
            'estado'=>$datos['estado'],
            'id_cargo' => $datos['id_cargo']
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Funcion de cargo creada con exito.',
            'data' => $FuncionesCargo
        ],201);
    }
    public function index()
    {
        return response()->json([
            'success' => true,
            'message'=>'Lista de funciones del cargo',
            'data' => FuncionesCargo::paginate(5)
        ], 200);
        
    }
    public function show(FuncionesCargo $funcionesCargo)
    {
        return response()->json([
            'success' => true,
            'message'=>'Funcion del cargo encontrada',
            'data' => $funcionesCargo
        ], 200);
    }
    public function update(Request $request, FuncionesCargo $funcionesCargo)
    {
        $datos = $request->validate([
            'descripcion_funcion' =>['required','string','max:350'],
            'estado' => ['required','string','max:255'],
            'id_cargo' => ['required','integer','exists:cargos']
        ]);
        $funcionesCargo->update([
            'descripcion_funcion'=>$datos ['descripcion_funcion'],
            'estado'=>$datos ['estado'],
            'id_cargo' => $datos ['id_cargo']
        ]);
        return response()->json([
            'success' => true,
            'message'=>'Funcion del cargo actualizada exitosamente',
            'data' => $funcionesCargo
        ], 200);
    }
    public function destroy(FuncionesCargo $funcionesCargo)
    {
            $eliminadofuncionesCargo = $funcionesCargo->delete();
         
        return response()->json([
            'success' => true,
            'mensaje'=>'La funcion del cargo fue eliminado exitosamente',
            'data' => $eliminadofuncionesCargo
        ],200);
    }
    
}