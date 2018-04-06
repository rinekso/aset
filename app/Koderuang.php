<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koderuang extends Model
{
    protected $fillable = [
    	'kepemilikan',
        'provinsi',
        'kabupaten',
        'bidang',
        'induk',
        'unit',
        'subunit',
        'ruangan',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit', 'id');
    }
}
