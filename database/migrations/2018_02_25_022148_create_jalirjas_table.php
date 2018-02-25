<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJalirjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalirjas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('kode_barang');
            $table->string('no_reg');
            $table->string('kontruksi');
            $table->double('panjang');
            $table->double('lebar');
            $table->double('luas');
            $table->string('lokasi');
            $table->string('no_dokumen');
            $table->date('tgl_dokumen');
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
        Schema::dropIfExists('jalirjas');
    }
}
