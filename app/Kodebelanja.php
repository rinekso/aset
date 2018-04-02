<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodebelanja extends Model
{
    protected $fillable = [
    	'kode',
        'deskripsi',   
    ];
}
