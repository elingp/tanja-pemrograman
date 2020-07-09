<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenpertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komenpertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('isi');
            $table->timestamps();
            $table->unsignedBigInteger('pengomentar_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('pengomentar_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komenpertanyaan');
    }
}
