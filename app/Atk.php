<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atk extends Model
{
    protected $table = 'atks';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'merk', 'jumlah', 'satuan', 'harga_satuan', 'total', 'stok', 'keterangan', 'jenis_barang',
    ];
}
