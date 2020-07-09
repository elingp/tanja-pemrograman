<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedispertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likedispertanyaan', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('pertanyaan_id')->unsigned();
            $table->integer('value')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likedispertanyaan');
    }
}
