<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter', 190);
            $table->string('spesialis', 150);
            $table->string('jadwal_hari', 150);
            $table->string('jadwal_waktu', 45);
            $table->string('foto_dokter', 170);
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
        Schema::dropIfExists('tbl_dokter');
    }
}
