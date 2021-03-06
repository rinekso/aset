<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'nip', 
        'nama', 
        'jenis_kelamin', 
        'tempat_lahir', 
        'tgl_lahir', 
        'alamat', 
        'no_telp',
        'subunit_id', 
        'unit_id', 
        'induk_id', 
        'jabatan',
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'nip', 'nip');
    }

    public function subunit() {
        return $this->belongsTo(Subunit::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function induk() {
        return $this->belongsTo(Induk::class);
    }

    public function role() {
        return $this->belongsTo(Role::class, 'jabatan');
    }

    public function kegiatan() {
        return $this->hasMany(Kegiatan::class, 'nip', 'user_id');
    }
}

