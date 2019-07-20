<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_orden',function (Blueprint $table){
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('idTipoServ');

            $table->foreign('idTipoServ')->references('id')->on('tipo_servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_orden');
    }
}
