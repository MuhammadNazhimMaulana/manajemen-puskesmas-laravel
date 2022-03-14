<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penilaian', function (Blueprint $table) {
            $table->id('id_penilaian');
            $table->string('nama_penilai');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('skor_pelayanan');
            $table->unsignedBigInteger('transaksi_id')->nullable();
            $table->unsignedBigInteger('pembelian_id')->nullable();
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
        Schema::dropIfExists('tbl_penilaian');
    }
}
