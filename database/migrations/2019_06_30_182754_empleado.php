<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado',function (Blueprint $table){
           $table->increments('id');
           $table->string('nombre');
           $table->string('usuario');
           $table->string('password');
           $table->integer('idTipoEmpleado');

           $table->foreign('idTipoEmpleado')->references('id')->on('tipo_empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
