<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pengadaan;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
    ];

    public function pengadaan(){
    	return $this->hasMany('Pengadaan');
    }
}
