<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id', true)->unsigned();
            $table->string('judul', 255);
            $table->text('isi')->nullable();
            $table->string('slug')->nullable();
            $table->string('uuid')->nullable();
            $table->timestamp('tgl_create')->useCurrent();
            $table->timestamp('tgl_update')->nullable();
            $table->unsignedBigInteger('penanya_id');
            $table->foreign('penanya_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
}
