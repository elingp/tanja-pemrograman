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
            $table->bigIncrements('id');
            $table->text('isi');
            $table->timestamps();
            $table->string('komentarcol')->nullable();
            $table->unsignedBigInteger('pengomentar_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('pengomentar_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jawaban_id')->references('id')->on('jawaban')->onDelete('cascade');
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
