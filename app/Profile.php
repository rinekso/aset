<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'user_id', 
        'nama', 
        'jenis_kelamin', 
        'tempat_lahir', 
        'tgl_lahir', 
        'alamat', 
        'no_telp', 
        'unit_id', 
        'bidang_id', 
        'jabatan',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
