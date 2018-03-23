<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    protected $fillable = [
    	'nama_barang',
        'kode_barang',
        'no_reg',
        'kondisi_bangunan',
        'bertingkat',
        'beton',
        'luas',
        'lokasi',
        'no_dokumen',
        'tgl_dokumen',
        'harga',
        'keterangan',
        'user_id',
        'kegiatan_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'kode');
    }
}
