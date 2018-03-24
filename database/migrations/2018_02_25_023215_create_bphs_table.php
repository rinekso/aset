<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bphs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('kode_barang');
            $table->string('no_reg');
            $table->string('merk');
            $table->double('jumlah');  
            $table->string('satuan')->nullable();          
            $table->double('harga_satuan');
            $table->double('total');
            $table->string('keterangan')->nullable();
            $table->string('user_id');
            $table->string('kegiatan_id');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bphs');
    }
}
