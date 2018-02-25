<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';
    protected $fillable = [
        'id',
        'nama',
        'jumlah', 
        'harga_satuan', 
        'total', 
        'kategori_id', 
        'keterangan', 
        'no_bst',
        'foto_bst', 
        'status_unit', 
        'status_bidang', 
        'user_id',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function kategori(){
    	return $this->belongsTo(Kategori::class);
    }

}
