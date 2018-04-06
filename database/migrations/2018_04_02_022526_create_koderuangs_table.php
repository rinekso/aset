<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoderuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koderuangs', function (Blueprint $table) {
            $table->increment('id');
            $table->string('kepemilikan');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('bidang');
            $table->string('induk');
            $table->string('unit');
            $table->string('subunit');
            $table->string('ruangan');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->primary('kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koderuangs');
    }
}
