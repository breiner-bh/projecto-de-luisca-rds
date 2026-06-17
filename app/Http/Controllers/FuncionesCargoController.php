<?php

namespace App\Http\Controllers;
use App\Models\FuncionesCargo;
use Illuminate\Http\Request;

class FuncionesCargoController extends Controller
{
    public function store(Request $request)
    {
        return FuncionesCargo::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->description
        ]);
    }
    public function index()
    {
        return FuncionesCargo::all();
    }
    public function show(FuncionesCargo $funcionesCargo)
    {
        return $funcionesCargo;
    }
    public function update(Request $request,FuncionesCargo $funcionesCargo)
    {
        $funcionesCargo->update([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);
        return $funcionesCargo;
    }
    public function destroy(FuncionesCargo $funcionesCargo)
    {
        $funcionesCargo->delete();
        return response()->json([
            'mensaje'=>'Funcion del Cargo eliminado exitosamente'
        ]);
    }
}
