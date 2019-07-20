<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    protected $table = "tipo_empleado";
    public $timestamps = false;
    protected $fillable = [
        'id','descripcion'
    ];
}
