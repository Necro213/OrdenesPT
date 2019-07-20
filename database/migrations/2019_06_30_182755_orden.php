<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden',function (Blueprint $table){
            $table->increments('id');
            $table->integer('idCliente');
            $table->integer('idTipoOrden');
            $table->integer('idEmpleado');
            $table->date('fecha_programada');
            $table->string('hora_programada');
            $table->longText('descripcion');
            $table->longText('fotos');
            $table->string('firma');

            $table->foreign('idCliente')->references('id')->on('cliente');
            $table->foreign('idTipoOrden')->references('id')->on('tipo_orden');
            $table->foreign('idEmpleado')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden');
    }
}
