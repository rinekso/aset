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
        'satuan',
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
        'kegiatan_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'kode');
    }
}
