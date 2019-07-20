<?php

use Illuminate\Database\Seeder;
use App\TipoEmpleado;
use App\Admin;
use App\TipoServicio;
use App\TipoOrden;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "id" => 1,
            "usuario" => 'admin',
            "password" => '1234'
        ]);

        TipoEmpleado::create([
            "id"=> 1,
            "descripcion"=> "Tipo 1",
          ]);
          TipoEmpleado::create([
            "id"=> 2,
            "descripcion"=> "Tipo 2",
          ]);
          TipoServicio::create([
              'id'=>1,
              'descripcion'=>"tecnico"
          ]);
          TipoOrden::create([
              'id' => 1,
              'descripcion' => "mantenimiento de equipo",
              'idTipoServ' => 1
          ]);

        TipoOrden::create([
            'id' => 2,
            'descripcion' => "mantenimiento de equipo 2",
            'idTipoServ' => 1
        ]);
    }
}
