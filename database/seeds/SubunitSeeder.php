<?php

use Illuminate\Database\Seeder;
use App\Subunit;

class SubunitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subunit::insert([
        	[
        		'id' => 1,
        		'nama_subunit' => 'Aa1',
        		'unit_id' => 1,
        	],
        	[
        		'id' => 2,
        		'nama_subunit' => 'Aa2',
        		'unit_id' => 1,
        	],
        	[
        		'id' => 3,
        		'nama_subunit' => 'Aa3',
        		'unit_id' => 1,
        	],

        	[
        		'id' => 4,
        		'nama_subunit' => 'Ab1',
        		'unit_id' => 2,
        	],
        	[
        		'id' => 5,
        		'nama_subunit' => 'Ab2',
        		'unit_id' => 2,
        	],
        	[
        		'id' => 6,
        		'nama_subunit' => 'Ab3',
        		'unit_id' => 2,
        	],
        ]);
    }
}
