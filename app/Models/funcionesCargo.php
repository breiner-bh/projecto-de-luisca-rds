<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class funcionesCargo extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'descripcion_fincion',
        'estado'
    ];
}
