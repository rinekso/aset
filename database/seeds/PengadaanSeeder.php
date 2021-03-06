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
        	 	'no_bst' => '12345', 
                'foto_bst' => '12345', 
        	 	'status_unit' => '1', 
        	 	'status_bidang' => '1', 
        	 	'user_id' => '111',
        	],
            [
                'nama' => 'Penggaris Besi KENKO',
                'jumlah' => '9', 
                'harga_satuan' => '25000', 
                'total' => '225000',
                'kategori_id' => '1', 
                'keterangan' => 'keperluan kantor baru', 
                'no_bst' => '12345ad',
                'foto_bst' => '12345', 
                'status_unit' => '0', 
                'status_bidang' => '0', 
                'user_id' => '444',
            ],
            [
                'nama' => 'Flashdisk Toshiba 8GB',
                'jumlah' => '8', 
                'harga_satuan' => '79000', 
                'total' => '632000',
                'kategori_id' => '2', 
                'keterangan' => 'keperluan karyawan baru', 
                'no_bst' => '12345',
                'foto_bst' => '12345',
                'status_unit' => '1', 
                'status_bidang' => '0', 
                'user_id' => '111',
            ],
        ]);
    }
}
