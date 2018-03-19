<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalirja extends Model
{
    protected $fillable = [
	    'nama_barang',
        'kode_barang',
        'no_reg',
        'kontruksi',
        'panjang',
        'lebar',
        'luas',
        'lokasi',
        'no_dokumen',
        'tgl_dokumen',
        'penggunaan',
        'asalusul',
        'harga',
        'keterangan',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
