<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenagaMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenaga_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rumahsakit');
            $table->unsignedBigInteger('id_kelurahan');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedBigInteger('id_wilayah');
            $table->integer('jumlah_tenaga_medis')->unsigned();
            $table->timestamps();

            $table->foreign('id_rumahsakit')->references('id')->on('rumah_sakit')->onUpdate('cascade');
            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onUpdate('cascade');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onUpdate('cascade');
            $table->foreign('id_wilayah')->references('id')->on('wilayah')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenaga_medis');
    }
}
