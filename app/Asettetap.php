<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asettetap extends Model
{
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'no_reg',
        'judul',
        'spesifikasi',
        'asal_daerah',
        'pencipta',
        'bahan',
        'jenis',
        'ukuran',
        'jumlah',
        'satuan',
        'harga_satuan',
        'tahun_cetak',
        'asalusul',
        'total',
        'keterangan',
        'user_id',
        'kegiatan_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'kode');
    }

    public function kir(){
        return $this->belongsTo(Kir::class, 'kode_barang', 'kode_barang');
    }
}
