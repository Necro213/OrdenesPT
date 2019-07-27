<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = "orden";
    public $timestamps = false;
    protected $fillable = [
        'id','idCliente','idTipoOrden','idEmpleado','fecha_programada',
        'hora_programada','descripcion','fotos','firma','cerrada','comentarios',
        'precio'
    ];
}
