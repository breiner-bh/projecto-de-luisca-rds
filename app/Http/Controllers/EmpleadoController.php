<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function store (Request $request)
    {
        return Empleado::create([
        'nombre' =>$request ->nombre,
        'apellido' =>$request ->apellido,
        'fecha_de_nacimiento' => $request -> fecha_de_nacimiento,
        'fecha_de_ingreso' => $request -> fecha_de_ingreso,
        'salario' => $request -> salario,
        'estado' => $request -> estado,
        'id_cargo' => $request -> id_cargo
    ]);
    }

    public function index()
    {
        return Empleado::all();
    }
    public function show(Empleado $empleado)
    {
        return $empleado;
    }
    public function update(Request $request,Empleado $empleado)
    {
        $empleado-> update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'Fecha_de_nacimiento'=> $request -> fecha_de_nacimiento,
            'Fecha_de_ingreso'=> $request -> fecha_de_ingreso,
            'salario' => $request -> salario,
            'estado' => $request -> estado,
            'id_cargo' => $request -> id_cargo            
        ]);
        return $empleado;
    }
    public function destroy( Empleado $empleado)
    {
        $empleado->delete();
        return response()->json([
            "mensaje"=>'Empleado elimidado exitosamente'
        ]);
    }
}
