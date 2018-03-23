<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
    	'kode',
    	'nama_kegiatan',
    ];

    public function pengadaan(){
    	return $this->hasMany(Pengadaan::class);
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id', 'nip');
    }

    public function profile(){
        return $this->belongsTo(Profile::class, 'user_id', 'nip');
    }    
}
