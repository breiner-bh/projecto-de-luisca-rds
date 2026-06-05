<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable =[
        'nombre',
        'apellido',
        'fecha_de_nacimiento',
        'fecha_de_ingreso',
        'salario',
        'estado',
        'id_cargo'
    ]; 
}
