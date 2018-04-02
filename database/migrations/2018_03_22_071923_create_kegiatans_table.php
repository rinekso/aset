<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('kode_kegiatan');
            $table->string('nama_kegiatan');
            $table->integer('tahun');
            $table->string('foto')->nullable();
            $table->string('foto2')->nullable();
            $table->string('pengguna')->nullable();
            $table->string('nip1')->nullable();
            $table->string('jabatan1')->nullable();
            $table->string('pptk')->nullable();
            $table->string('nip2')->nullable();
            $table->string('jabatan2')->nullable();
            $table->string('pejabat')->nullable();
            $table->string('nip3')->nullable();
            $table->string('jabatan3')->nullable();
            $table->string('pengurus')->nullable();
            $table->string('nip4')->nullable();
            $table->string('jabatan4')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('kegiatans');
    }
}
