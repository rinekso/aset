<?php

use Illuminate\Database\Seeder;
use App\Induk;

class IndukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Induk::insert([
        	[
        		'id' => 1,
        		'nama_induk' => 'A',
        	],
        	[
        		'id' => 2,
        		'nama_induk' => 'B',
        	],
        	[
        		'id' => 3,
        		'nama_induk' => 'C',
        	],
        ]);
    }
}
