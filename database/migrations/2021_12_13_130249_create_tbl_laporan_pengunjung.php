<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLaporanPengunjung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_laporan_pengunjung', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->bigInteger('jumlah_pengunjung');
            $table->bigInteger('jumlah_transaksi');
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->string('nama_admin');

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
        Schema::dropIfExists('tbl_laporan_pengunjung');
    }
}
