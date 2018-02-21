<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	[
        		'id' => '1',
        		'role' => 'subunit',
        	],
        	[
        		'id' => '2',
        		'role' => 'unit',
        	],
        	[
        		'id' => '3',
        		'role' => 'bidang',
        	],
        ]);    
    }
}
