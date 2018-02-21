<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
        		'id' => '111',
                'name' => 'Subunit',
        		'email' => 'subunit@gmail.com',
        		'password' => \Hash::make('123456'),
        		'role' => '1',
        	],
        	[
        		'id' => '222',
                'name' => 'Unit',
        		'email' => 'unit@gmail.com',
        		'password' => \Hash::make('123456'),
        		'role' => '2',
        	],
        	[
        		'id' => '333',
                'name' => 'Bidang',
        		'email' => 'bidang@gmail.com',
        		'password' => \Hash::make('123456'),
        		'role' => '3',
        	],
            [
                'id' => '444',
                'name' => 'Bambang Sub',
                'email' => 'bambang@gmail.com',
                'password' => \Hash::make('123456'),
                'role' => '1',
            ],
        ]);
    }
}
