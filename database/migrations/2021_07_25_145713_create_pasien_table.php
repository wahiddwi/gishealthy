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
            $table->unsignedBigInteger('id_wilayah');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedBigInteger('id_kelurahan');
            $table->unsignedBigInteger('id_rumahsakit');
            $table->unsignedBigInteger('id_jeniskamar');
            $table->unsignedBigInteger('id_infokamar');
            $table->string('nama_pasien', 40);
            $table->integer('usia')->unsigned();
            $table->enum('jenis_kelamin', ["P", "L"]);
            $table->enum('status', ["Sembuh", "Positif", "Meninggal"]);
            $table->text('alamat');
            $table->string('no_telpon', 13);
            $table->date('tanggal_keluar')->nullable();
            $table->timestamps();
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
