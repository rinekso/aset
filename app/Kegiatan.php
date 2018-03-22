<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
    	'id',
    	'nama_kegiatan';
    ];

    public function pengadaan(){
    	return $this->hasMany(Pengadaan::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
