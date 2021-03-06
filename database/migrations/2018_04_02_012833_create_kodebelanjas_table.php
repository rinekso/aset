<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKodebelanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kodebelanjas', function (Blueprint $table) {
            $table->string('kode');
            $table->string('deskripsi');
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
        Schema::dropIfExists('kodebelanjas');
    }
}
