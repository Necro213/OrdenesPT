<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role= new Role();
        $role->name="admin";
        $role->save();

        $role1= new Role();
        $role1->name="user";
        $role1->save();
    }
}
