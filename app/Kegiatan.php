<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
    	'kode',
        'kode_kegiatan',
    	'nama_kegiatan',
        'tgl_kegiatan',
        'foto',
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

    public function asettetap(){
        return $this->hasMany(Asettetap::class, 'kode', 'kegiatan_id');
    }    

    public function bangunan(){
        return $this->hasMany(Bangunan::class, 'kode', 'kegiatan_id');
    }    

    public function bph(){
        return $this->hasMany(Bph::class, 'kode', 'kegiatan_id');
    }    

    public function jalirja(){
        return $this->hasMany(Jalirja::class, 'kode', 'kegiatan_id');
    }    

    public function kontruksi(){
        return $this->hasMany(Kontruksi::class, 'kode', 'kegiatan_id');
    }    

    public function mesin(){
        return $this->hasMany(Mesin::class, 'kode', 'kegiatan_id');
    }    

    public function tanah(){
        return $this->hasMany(Tanah::class, 'kode', 'kegiatan_id');
    }

    public function kodekegiatan(){
        return $this->belongsTo(Kodekegiatan::class, 'kode_kegiatan', 'kode');
    }
}
