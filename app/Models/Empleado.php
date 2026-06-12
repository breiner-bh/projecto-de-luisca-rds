<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;
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
