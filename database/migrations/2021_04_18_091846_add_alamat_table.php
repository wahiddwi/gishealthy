<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rumah_sakit', function (Blueprint $table) {
            $table->string('alamat', 100)->after('nama_rumahsakit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rumah_sakit', function (Blueprint $table) {
            $table->dropColumn('rumah_sakit');
        });
    }
}
