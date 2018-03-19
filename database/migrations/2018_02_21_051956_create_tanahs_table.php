<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('kode_barang');
            $table->string('no_reg');
            $table->double('luas');
            $table->integer('tahun_pengadaan');
            $table->string('lokasi');
            $table->string('hak');
            $table->string('no_sertifikat');
            $table->date('tgl_sertifikat');
            $table->string('penggunaan');
            $table->string('asalusul');
            $table->double('harga');
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
        Schema::dropIfExists('tanahs');
    }
}
