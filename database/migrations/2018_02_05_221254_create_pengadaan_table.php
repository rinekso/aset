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
            $table->increments('id');
            $table->string('nama');
            $table->double('jumlah');
            $table->double('harga_satuan');
            $table->double('total');
            $table->integer('kategori_id')->unsigned();
            $table->text('keterangan');
            $table->string('no_spk');
            $table->integer('status_unit');
            $table->integer('status_bidang');
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
        Schema::dropIfExists('pengadaan');
    }
}
