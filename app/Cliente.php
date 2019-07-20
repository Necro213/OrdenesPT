<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    public $timestamps = false;
    protected $fillable = [
        'id','nombre','descripcion','direccion','telefono','email'
    ];
}
