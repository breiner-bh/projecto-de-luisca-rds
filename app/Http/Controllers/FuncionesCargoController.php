<?php

namespace App\Http\Controllers;
use App\Models\funcionesCargo;
use Illuminate\Http\Request;

class FuncionesCargoController extends Controller
{
    public function store(Request $request)
    {
        return FuncionesCargoController::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->description
        ]);
    }
    public function index()
    {
        return funcionesCargo::all();
    }
    public function show(funcionesCargo $funcionesCargo)
    {
        return $funcionesCargo;
    }
    public function update(Request $request,funcionesCargo $funcionesCargo)
    {
        $funcionesCargo->update([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);
        return $funcionesCargo;
    }
    public function destroy(funcionesCargo $funcionesCargo)
    {
        $funcionesCargo->delete();
        return response()->json([
            'mensaje'=>'Funcion del Cargo eliminado exitosamente'
        ]);
    }
}
