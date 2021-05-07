<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelurahan');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedBigInteger('id_wilayah');
            $table->integer('usia')->unsigned();
            $table->enum('jenis_kelamin', ["P", "L"]);
            $table->enum('status', ["Positif", "Meninggal", "Sembuh"]);
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('id_wilayah')->references('id')->on('wilayah')->onUpdate('cascade');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onUpdate('cascade');
            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
