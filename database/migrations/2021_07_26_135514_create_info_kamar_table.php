<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rumahsakit');
            $table->unsignedBigInteger('id_kamar');
            $table->enum('status', ["Tersedia", "Terisi"]);
            $table->timestamps();

            $table->foreign('id_rumahsakit')->references('id')->on('rumah_sakit')->onUpdate('cascade');
            $table->foreign('id_kamar')->references('id')->on('kamar')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_kamar');
    }
}
