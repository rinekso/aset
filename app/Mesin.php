<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesins';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'no_reg',
        'merk',
        'ukuran',
        'bahan',
        'tahun_pembelian',
        'no_pabrik',
        'no_mesin',
        'no_rangka',
        'no_polisi',
        'no_bpkb',
        'asalusul',
        'jumlah',
        'satuan',
        'harga_satuan',
        'total',
        'keterangan',
        'user_id',
        'kegiatan_id',
        'lokasi_id',
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

    public function koderuang(){
        return $this->belongsTo(Koderuang::class, 'lokasi_id', 'id');
    }
}
