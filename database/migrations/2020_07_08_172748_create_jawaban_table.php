<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->bigIncrements('id', true)->unsigned();
            $table->text('isi')->nullable();
            $table->timestamp('tgl_create')->useCurrent();
            $table->timestamp('tgl_update')->nullable();
            $table->tinyInteger('is_selected');
            $table->unsignedBigInteger('penjawab_id');
            $table->foreign('penjawab_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
}
