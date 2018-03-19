<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsettetapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asettetaps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('kode_barang');
            $table->string('no_reg');
            $table->string('judul')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->string('asal_daerah')->nullable();
            $table->string('pencipta')->nullable();
            $table->string('bahan')->nullable();
            $table->string('jenis')->nullable();
            $table->string('ukuran')->nullable();
            $table->integer('jumlah');
            $table->double('harga_satuan');
            $table->string('tahun_cetak')->nullable();
            $table->string('asalusul');
            $table->double('total');
            $table->text('keterangan')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('asettetaps');
    }
}
