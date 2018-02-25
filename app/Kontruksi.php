<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontruksi extends Model
{
    protected $fillable = [
    	'nama_barang',
        'bangunan',
        'bertingkat',
        'beton',
        'luas',
        'tahun_pembelian',
        'lokasi',
        'no_dokumen',
        'tgl_dokumen',
        'tgl_mulai',
        'status_tanah',
        'kode_tanah',
        'asalusul',
        'nilai_kontrak',
        'keterangan',
        'user_id',
    ];
}
