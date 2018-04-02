<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';
    protected $fillable = [
        'id',
        'kegiatan_id',
        'kode_belanja',
        'tgl_pengadaan',
        'nama',
        'jumlah', 
        'satuan',
        'harga_satuan', 
        'total', 
        'kategori_id', 
        'keterangan', 
        'status_unit', 
        'status_bidang', 
        'lokasi_kir',
        'bast',
        'bast2',
        'user_id',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function kategori(){
    	return $this->belongsTo(Kategori::class);
    }

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class);
    }

}
