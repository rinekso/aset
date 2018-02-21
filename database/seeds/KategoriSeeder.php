<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::insert([
        	[
        		'id' => '1',
        		'nama_kategori' => 'ATK',
        	],
        	[
        		'id' => '2',
        		'nama_kategori' => 'Elektronika',
        	],
        	[
        		'id' => '3',
        		'nama_kategori' => 'Mesin',
        	],
        	[
        		'id' => '4',
        		'nama_kategori' => 'Meuble',
        	],
        	[
        		'id' => '5',
        		'nama_kategori' => 'Tanah',
        	],
        ]);
    }
}
