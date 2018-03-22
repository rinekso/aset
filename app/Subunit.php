<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    protected $table = 'subunits';
    protected $fillable = [
    	'nama_subunit',
        'unit_id',
    ];

    public function profile(){
    	return $this->hasMany(Profile::class);
    }

    public function unit(){
    	return $this->belongsTo(Unit::class);
    }
}
