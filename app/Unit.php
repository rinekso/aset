<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = [
    	'nama_unit',
        'induk_id',
    ];

    public function profile(){
    	return $this->hasMany(Profile::class);
    }

    public function subunit(){
    	return $this->hasMany(Subunit::class);
    }

    public function induk(){
    	return $this->belongsTo(Induk::class);
    }
}
