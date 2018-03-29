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
        		'nama_unit' => 'Sekretariat',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 2,
        		'nama_unit' => 'Bidang Pariwisata',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 3,
        		'nama_unit' => 'Bidang Kebudayaan',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 4,
        		'nama_unit' => 'Bidang Pemuda dan Olahraga',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 5,
        		'nama_unit' => 'Bidang Pemasaran',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 6,
        		'nama_unit' => 'UPT Museum',
        		'induk_id' => 1,
        	],
        	[
        		'id' => 7,
        		'nama_unit' => 'UPT Destinasi',
        		'induk_id' => 1,
        	],
        ]);
    }
}
