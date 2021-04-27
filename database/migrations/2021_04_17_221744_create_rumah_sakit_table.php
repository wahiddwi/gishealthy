<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahSakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_wilayah');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedBigInteger('id_kelurahan');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_rumahsakit', 40);
            $table->string('no_telpon', 15);
            $table->integer('jumlah_kamar');
            $table->string('latitude', 20);
            $table->string('longitude', 20);
            $table->timestamps();

            $table->foreign('id_wilayah')->references('id')->on('wilayah')->onUpdate('cascade');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onUpdate('cascade');
            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah_sakit');
    }
}
