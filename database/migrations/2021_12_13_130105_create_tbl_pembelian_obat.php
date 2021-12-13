<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPembelianObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pembelian_obat', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->float('ppn', 8, 2);
            $table->integer('jumlah_bayar');
            $table->string('foto_bukti_bayar_obat');
            $table->date('tgl_bayar');
            $table->date('tgl_tenggat');
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
        Schema::dropIfExists('tbl_pembelian_obat');
    }
}
