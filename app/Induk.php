<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Induk extends Model
{
    protected $table = 'induks';
    protected $fillable = [
    	'nama_induk',
    ];

    public function profile(){
    	return $this->hasMany(Profile::class);
    }

    public function unit(){
    	return $this->hasMany(Unit::class);
    }
}
