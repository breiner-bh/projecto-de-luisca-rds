<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function store (Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string','max:255','unique:empleado'],
            'apellido' =>['required','string','max:255','unique:empleados'],
            'fecha_de_nacimiento' => ['required','date','before:today'],
            'fecha_de_ingreso' => ['required','date','before\or\_equal:today'],
            'salario' => ['required','numeric'],
            'estado' => ['required','string','max = 255'],
            'id_cargo' => ['required','integer','exists:cargos'],
            ],
            [
                'nombre.unique'=>'No puede duplicar el nombre del empleado.',
                'apellido.unique' =>'No se puede duplicar el apellido del empleado.',
        ]);
        $empleado = Empleado::create([
        'nombre' =>$datos['nombre'],
        'apellido' =>$datos['apellido'],
        'fecha_de_nacimiento' => $datos['fecha_de_nacimiento'],
        'fecha_de_ingreso' => $datos['fecha_de_ingreso'],
        'salario' => $datos ['salario'],
        'estado' => $datos ['estado'],
        'id_cargo' => $datos ['id_cargo']
    ]);
    return response()->json([
        'success'=> true,
        'message'=>'empleado creado exitosamente',
        'data' => $empleado 
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            "message"=>'Lista de los empleados',
            'data'=>Empleado::paginate(5)
        ], 200);
    }
    public function show(Empleado $empleado)
    {
        return response()->json([
            'success'=> true,
            'menssage'=>'Empleado encontrado',
            'data'=>$empleado
        ],200);
    }
    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string','max:255'],
            'apellido' =>['required','string','max:255'],
            'fecha_de_nacimiento' => ['required','date','before:today'],
            'fecha_de_ingreso' => ['required','date','before\or\_equal:today'],
            'salario' => ['required','numeric'],
            'estado' => ['required','string','max = 255'],
            'id_cargo' => ['required','integer','exists:cargos']
        ]);
        $empleado-> update([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'Fecha_de_nacimiento'=> $datos ['fecha_de_naciomiento'],
            'Fecha_de_ingreso'=> $datos ['fecha_de_ingreso'],
            'salario' => $datos['salario'],
            'estado' => $datos ['estado'],
            'id_cargo' => $datos ['id_cago']            
        ]);
        return response()->json([
            'success' =>true,
            'mensaje' =>'Empleado actualizado exitosamente',
            'data' => $empleado
        ], 200);
    }
    public function destroy( int $id)
    {
        $empleado=Empleado::find($id);
        if(is_null($empleado)){
            return response()->json(['message'=>'Usuario no existente'
            ],404);        
            }else{
                $empleado->delete();
                return response()->json([
                    'success'=> true,
                    'menssage'=>'Empleado eliminado exitosamente',
                    'data'=>$empleado
                    ],200);
        };
        
    }
}
