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
        		'nama_kategori' => 'Tanah',
        	],
        	[
        		'id' => '2',
        		'nama_kategori' => 'Peralatan dan Mesin',
        	],
        	[
        		'id' => '3',
        		'nama_kategori' => 'Gedung dan Bangunan',
        	],
        	[
        		'id' => '4',
        		'nama_kategori' => 'Jalan, Irigasi dan Jaringan',
        	],
        	[
        		'id' => '5',
        		'nama_kategori' => 'Aset Tetap dan Lainnya',
        	],
            [
                'id' => '6',
                'nama_kategori' => 'Kontruksi dan Pengerjaan',
            ],
            [
                'id' => '7',
                'nama_kategori' => 'Barang Pakai Habis',
            ],
        ]);
    }
}
