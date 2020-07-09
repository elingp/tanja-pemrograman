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
            $table->bigIncrements('id', true)->unsigned();
            $table->text('isi');
            $table->unsignedBigInteger('pengomentar_id')->unsigned()->default(11);
            $table->string('komentarcol')->nullable()->default(45);
            $table->timestamp('tgl_create')->useCurrent();
            $table->unsignedBigInteger('pertanyaan_id')->unsigned()->default(12);
            $table->foreign('pengomentar_id')->references('id')->on('users');
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
        Schema::dropIfExists('komenpertanyaan');
    }
}
