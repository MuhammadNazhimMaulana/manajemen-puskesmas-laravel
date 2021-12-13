<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pasien_id');
            $table->bigInteger('biaya_pembayaran');
            $table->string('nama_kasir');
            $table->string('foto_bukti_bayar');
            $table->enum('ket_pembayaran', ['Lunas', 'Belum Lunas', 'Menunggak']);
            $table->date('tanggal_bayar');
            $table->date('tenggat_pembayaran');
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
        Schema::dropIfExists('tbl_transaksi');
    }
}
