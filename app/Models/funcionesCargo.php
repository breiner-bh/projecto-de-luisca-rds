<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionesCargo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion_funcion',
        'estado',
        'id_cargo'
    ];
}
