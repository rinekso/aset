<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    protected $fillable = [
    	'bast',
    	'kegiatan_id',
    	'tahun',
    ];

	public function kegiatan(){
		return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'kode');
	}
}

