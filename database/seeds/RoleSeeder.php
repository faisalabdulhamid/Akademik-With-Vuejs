<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new App\Entrust\Role();
        $role->name = 'Tatausaha';
        $role->display_name = 'Tatausaha';
        $role->save();

        $role = new App\Entrust\Role();
        $role->name = 'Guru';
        $role->display_name = 'Guru';
        $role->save();
    }
}
