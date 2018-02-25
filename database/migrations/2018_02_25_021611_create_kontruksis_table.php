<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontruksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontruksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('bangunan');
            $table->string('bertingkat');
            $table->string('beton');
            $table->integer('luas');
            $table->string('lokasi');
            $table->string('no_dokumen')->nullable();
            $table->date('tgl_dokumen')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->string('status_tanah')->nullable();
            $table->string('kode_tanah')->nullable();
            $table->string('asalusul');
            $table->double('nilai_kontrak');
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
        Schema::dropIfExists('kontruksis');
    }
}
