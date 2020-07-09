<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenjawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komenjawaban', function (Blueprint $table) {
            $table->bigIncrements('id', true)->unsigned();
            $table->text('isi');
            $table->unsignedBigInteger('pengomentar_id')->unsigned()->default(11);
            $table->string('komentarcol')->nullable()->default(45);
            $table->timestamp('tgl_create')->useCurrent();
            $table->unsignedBigInteger('jawaban_id')->unsigned()->default(12);
            $table->foreign('pengomentar_id')->references('id')->on('users');
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komenjawaban');
    }
}
