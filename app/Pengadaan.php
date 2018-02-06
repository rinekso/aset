<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Kategori;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';
    protected $fillable = [
        'nama', 'jumlah', 'harga_satuan', 'total', 'id_kategori', 'keterangan', 'no_spk', 'status_unit', 'status_bidang', 'id_user',
    ];

    public function user(){
    	return $this->belongsTo('User');
    }

    public function kategori(){
    	return $this->belongsTo('Kategori');
    }

}
