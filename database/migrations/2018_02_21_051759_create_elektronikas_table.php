<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElektronikasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elektronikas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('merk');
            $table->string('spesifikasi');
            $table->string('no_seri')->nullable();
            $table->double('jumlah');
            $table->string('satuan');
            $table->double('harga_satuan');
            $table->double('total');
            $table->double('stok');
            $table->string('keterangan');
            $table->string('jenis_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elektronikas');
    }
}
