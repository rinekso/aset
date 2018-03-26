<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kir extends Model
{
    protected $fillable = [
    	'lokasi',
    	'kode_barang',
    	'kategori_id',
    ];

    public function mesin(){
    	return $this->hasOne(Mesin::class, 'kode_barang', 'kode_barang');
    }

    public function asettetap(){
    	return $this->hasOne(Asettetap::class, 'kode_barang', 'kode_barang');
    }

}
