<?php

namespace App\Http\Controllers;
use App\Models\cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function store(Request $request)
    {
        return Cargo::create([
        'id'=>$request->id,
        'nombre_cargo'=>$request->nombre_cargo,
        'descripcion'=>$request->descripcion
    ]);
    }
    public function index()
    {
        return Cargo::all();
    }
    public function show(Cargo $cargo)
    {
        return $cargo;
    }
    public function update(Request $request, Cargo $cargo)
    {
        $cargo->update([
            'id'=>$request->id,
            'nombre_cargo'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);
        return $cargo;
    }
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return response()->Json([
            'mensaje'=>'Cargo eliminado exitodamente'
        ]);
    }
}
