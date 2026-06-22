<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\funcionesCargo;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validator([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'fecha_de_nacimiento' => ['required', 'date', 'before_or_equal:today'],
            'fecha_de_ingreso' => ['required', 'date', 'before_or_equal:today'],
            'salario' => ['required', 'numeric'],
            'estado' => ['required', 'string', 'max:255'],
            'id_cargo' => ['required', 'integer', 'exists:cargos,id'],

        ]);
        $empleado = Empleado::create([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'fecha_de_nacimiento' => $datos['fecha_de_nacimiento'],
            'fecha_de_ingreso' => $datos['fecha_de_ingreso'],
            'salario' => $datos['salario'],
            'estado' => $datos['estado'],
            'id_cargo' => $datos['id_cargo']
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Empleado creado exitosamente',
            'data' => $empleado
        ], 201);
    }

    public function index(int $id)
    {
        $empleados = Empleado::firnd($id);
        if ($empleados->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No se encontradon empleados registrados',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Lista de los empleados encontrados',
                'data' => $empleados
            ], 200);
        }
    }
    public function show(int $id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json([
                'success' => false,
                'message' => 'Empleado no encontrado o no existe',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'menssage' => 'Empleado encontrado',
                'data' => $empleado
            ], 200);
        }
    }
    public function detalle_de_empleado(Empleado $empleado)
    {
        $empleadoDetalle = Empleado::leftJoin(
            'cargos',
            'empleados.id_cargo',
            '=',
            'cargos.id'
        )
            ->select(
                'empleados.id',
                'empleados.nombre',
                'empleados.apellido',
                'empleados.salario',
                'cargos.id as cargo_id',
                'cargos.nombre_cargo',
                'cargos.descripcion'
            )
            ->where('empleados.id', $empleado->id)
            ->first();

        if (!$empleadoDetalle) {
            return response()->json([
                'success' => false,
                'message' => 'Empleado no encontrado'
            ], 404);
        }

        $funciones = FuncionesCargo::where(
            'id_cargo',
            $empleadoDetalle->cargo_id
        )
            ->pluck('descripcion_funcion');

        return response()->json([
            'success' => true,
            'message' => 'Resumen del empleado',
            'data' => [
                'id' => $empleadoDetalle->id,
                'nombre' => $empleadoDetalle->nombre,
                'apellido' => $empleadoDetalle->apellido,
                'salario' => $empleadoDetalle->salario,
                'cargo' => $empleadoDetalle->nombre_cargo,
                'descripcion_cargo' => $empleadoDetalle->descripcion,
                'funciones' => $funciones
            ]
        ]);
    }
    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'fecha_de_nacimiento' => ['required', 'date', 'before_or_equal:today'],
            'fecha_de_ingreso' => ['required', 'date', 'before_or_equal:today'],
            'salario' => ['required', 'numeric'],
            'estado' => ['required', 'string', 'max:255'],
            'id_cargo' => ['required', 'integer', 'exists:cargos,id']
        ]);
        $empleado->update([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'Fecha_de_nacimiento' => $datos['fecha_de_nacimiento'],
            'Fecha_de_ingreso' => $datos['fecha_de_ingreso'],
            'salario' => $datos['salario'],
            'estado' => $datos['estado'],
            'id_cargo' => $datos['id_cargo']
        ]);
        return response()->json([
            'success' => true,
            'mensaje' => 'Empleado actualizado exitosamente',
            'data' => $empleado
        ], 200);
    }
    public function destroy(int $id)
    {
        $empleado = Empleado::find($id);
        if (is_null($empleado)) {
            return response()->json([
                'message' => 'Usuario no existente'
            ], 404);
        } else {
            $empleado->delete();
            return response()->json([
                'success' => true,
                'menssage' => 'Empleado eliminado exitosamente',
                'data' => $empleado
            ], 200);
        };
    }
}
