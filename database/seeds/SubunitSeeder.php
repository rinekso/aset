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
        		'nama_subunit' => 'Sub Bagian Umum dan Kepegawaian',
        		'unit_id' => 1,
        	],
        	[
        		'id' => 2,
        		'nama_subunit' => 'Sub Bagian Program dan Perencanaan',
        		'unit_id' => 1,
        	],
        	[
        		'id' => 3,
        		'nama_subunit' => 'Sub Bagian Keuangan',
        		'unit_id' => 1,
        	],

        	[
        		'id' => 4,
        		'nama_subunit' => 'Seksi Pengembangan Destinasi Pariwisata',
        		'unit_id' => 2,
        	],
        	[
        		'id' => 5,
        		'nama_subunit' => 'Seksi Pengendalian dan Pengawasan Usaha Pariwisata',
        		'unit_id' => 2,
        	],
        	[
        		'id' => 6,
        		'nama_subunit' => 'Seksi Pemberdayaan Sumber Daya Pariwisata',
        		'unit_id' => 2,
        	],
            [
                'id' => 7,
                'nama_subunit' => 'Seksi Pelestarian Cagar Budaya, Kepurbakalaan dan Permuseuman',
                'unit_id' => 3,
            ],
            [
                'id' => 8,
                'nama_subunit' => 'Seksi Pembinaan Kesenian dan Tradisi',
                'unit_id' => 3,
            ],
            [
                'id' => 9,
                'nama_subunit' => 'Seksi Pelestarian Sejarah',
                'unit_id' => 3,
            ],
            [
                'id' => 10,
                'nama_subunit' => 'Kasi Kepemudaan',
                'unit_id' => 4,
            ],
            [
                'id' => 11,
                'nama_subunit' => 'Seksi Olah Raga',
                'unit_id' => 4,
            ],
            [
                'id' => 12,
                'nama_subunit' => 'Seksi Informasi',
                'unit_id' => 5,
            ],
            [
                'id' => 13,
                'nama_subunit' => 'Seksi Promosi',
                'unit_id' => 5,
            ],
            [
                'id' => 14,
                'nama_subunit' => 'Seksi Kerjasama dan Investasi',
                'unit_id' => 5,
            ],
        ]);
    }
}
