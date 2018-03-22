<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::insert([
        	[
        		'id' => 1,
        		'nama_unit' => 'Aa',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 2,
        		'nama_unit' => 'Ab',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 3,
        		'nama_unit' => 'Ac',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 4,
        		'nama_unit' => 'Ba',
        		'induk_id' => 2,
        	],
        	[
        		'id' => 5,
        		'nama_unit' => 'Bb',
        		'induk_id' => 2,
        	],
        	[
        		'id' => 6,
        		'nama_unit' => 'Ca',
        		'induk_id' => 3,
        	],
        	[
        		'id' => 7,
        		'nama_unit' => 'Cb',
        		'induk_id' => 3,
        	],
        ]);
    }
}
