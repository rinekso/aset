<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodekegiatan extends Model
{
    protected $fillable = [
    	'kode',
        'nama_kegiatan',   
    ];
}
