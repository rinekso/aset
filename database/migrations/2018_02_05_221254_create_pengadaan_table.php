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
            $table->string('kode_belanja');
            $table->date('tgl_pengadaan');
            $table->string('nama');
            $table->double('jumlah');
            $table->string('satuan')->nullable();
            $table->double('harga_satuan');
            $table->double('total');
            $table->integer('kategori_id')->unsigned();
            $table->text('keterangan')->nullable();
            $table->integer('status_unit');
            $table->integer('status_bidang');
            $table->string('lokasi_kir')->nullable();
            $table->string('bast')->nullable();
            $table->string('bast2')->nullable();
            $table->string('user_id');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

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
