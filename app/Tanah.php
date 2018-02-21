<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    protected $table = 'tanahs';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'no_sertifikat', 'ukuran', 'satuan', 'harga_satuan', 'total', 'lokasi', 'keterangan',
    ];
}
