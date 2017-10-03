<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(RoleSeeder::class);
        factory(App\Models\Pegawai::class, 5)->create();
        factory(App\Models\Siswa::class, 1000)->create();
    }
}
