<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip', 'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(Profile::class, 'nip', 'nip');
    }

    public function pengadaan(){
        return $this->hasMany(Pengadaan::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function tanah(){
        return $this->hasMany(Tanah::class);   
    }

    public function mesin(){
        return $this->hasMany(Mesin::class);   
    }

    public function bangunan(){
        return $this->hasMany(Bangunan::class);   
    }

    public function jalirja(){
        return $this->hasMany(Jalirja::class);   
    }

    public function asettetap(){
        return $this->hasMany(Asettetap::class);   
    }

    public function kontruksi(){
        return $this->hasMany(Kontruksi::class);   
    }

    public function bph(){
        return $this->hasMany(Bph::class);   
    }

    public function kegiatan(){
        return $this->hasMAny(Kegiatan::class);
    }
}
