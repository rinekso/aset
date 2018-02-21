<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elektronika extends Model
{
    protected $table = 'elektronikas';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'merk','spesifikasi', 'no_seri', 'jumlah', 'satuan', 'harga_satuan', 'total', 'stok', 'keterangan', 'jenis_barang',
    ];
}
