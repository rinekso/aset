<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->integer('id');
            $table->string('kegiatan_id');
            $table->string('nama');
            $table->double('jumlah');
            $table->double('harga_satuan');
            $table->double('total');
            $table->integer('kategori_id')->unsigned();
            $table->text('keterangan');
            $table->string('no_bst');
            $table->string('foto_bst');
            $table->integer('status_unit');
            $table->integer('status_bidang');
            $table->string('user_id');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengadaan');
    }
}
