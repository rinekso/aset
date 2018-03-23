<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bph extends Model
{
    protected $fillable = [
    	'nama_barang',
        'kode_barang',
        'no_reg',
        'merk',
        'jumlah',
        'harga_satuan',
        'total',
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
