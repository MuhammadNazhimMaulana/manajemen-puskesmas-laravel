<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('ruang_id');
            $table->unsignedBigInteger('daftar_id');
            $table->unsignedBigInteger('obat_id')->nullable();
            $table->dateTime('jadwal_periksa');
            $table->string('keterangan');
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
        Schema::dropIfExists('tbl_pasien');
    }
}
