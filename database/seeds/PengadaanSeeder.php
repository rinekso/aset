<?php

use Illuminate\Database\Seeder;
use App\Pengadaan;

class PengadaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengadaan::insert([
        	[
        		'nama' => 'Kertas',
        	 	'jumlah' => '2', 
        	 	'harga_satuan' => '30000', 
        	 	'total' => '60000',
        	 	'kategori_id' => '1', 
        	 	'keterangan' => 'keperluan pencetakan laporan', 
        	 	'no_spk' => '12345', 
        	 	'status_unit' => '0', 
        	 	'status_bidang' => '0', 
        	 	'user_id' => '111',
        	],
            [
                'nama' => 'Penggaris Besi KENKO',
                'jumlah' => '9', 
                'harga_satuan' => '25000', 
                'total' => '225000',
                'kategori_id' => '1', 
                'keterangan' => 'keperluan kantor baru', 
                'no_spk' => '12345ad', 
                'status_unit' => '0', 
                'status_bidang' => '0', 
                'user_id' => '444',
            ],
        ]);
    }
}
