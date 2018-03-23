<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    protected $table = 'tanahs';
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'no_reg',
        'luas',
        'tahun_pengadaan',
        'lokasi',
        'hak',
        'no_sertifikat',
        'tgl_sertifikat',
        'penggunaan',
        'asalusul',
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
