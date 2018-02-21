<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesins';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'merk', 'type', 'ukuran', 'bahan', 'no_pabrik', 'no_rangka', 'no_mesin', 'jumlah', 'harga_satuan', 'total', 'lokasi', 'keterangan',
    ];
}
