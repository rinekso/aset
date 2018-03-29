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
        // $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(IndukSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(SubunitSeeder::class);
        // $this->call(ProfileSeeder::class);
        // $this->call(PengadaanSeeder::class);
    } 
}
