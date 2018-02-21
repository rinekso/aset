<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::insert([
        	[
        		'user_id' => '111',
                'nama' => 'Subunit',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Mojokerto',
                'tgl_lahir' => '1997-05-23',
                'alamat' => 'Jl A. Yani 13',
                'no_telp' => '0864744746474',
                'unit_id' => '1',
                'bidang_id' => '1',
                'jabatan' => 'anggota',
        	],
            [
                'user_id' => '222',
                'nama' => 'Unit',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Jombang',
                'tgl_lahir' => '1993-05-23',
                'alamat' => 'Jl Gajah Mada 13',
                'no_telp' => '0864744746474',
                'unit_id' => '1',
                'bidang_id' => '1',
                'jabatan' => 'kepala',
            ],
            [
                'user_id' => '345',
                'nama' => 'Bidang',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Nganjuk',
                'tgl_lahir' => '1990-05-23',
                'alamat' => 'Jl Soekarno 13',
                'no_telp' => '0864744746474',
                'unit_id' => null,
                'bidang_id' => '1',
                'jabatan' => 'kepala',
            ],
        ]);
    }
}
