<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meuble extends Model
{
    protected $table = 'meubles';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'merk', 'type', 'ukuran', 'jumlah', 'harga_satuan', 'total', 'lokasi', 'keterangan',
    ];
}
