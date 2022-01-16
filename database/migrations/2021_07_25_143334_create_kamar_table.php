<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rumahsakit');
            $table->unsignedBigInteger('id_jeniskamar');
            $table->integer('no_kamar')->unsigned();
            $table->timestamps();

            $table->foreign('id_rumahsakit')->references('id')->on('rumah_sakit')->onUpdate('cascade');
            $table->foreign('id_jeniskamar')->references('id')->on('jenis_kamar')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
