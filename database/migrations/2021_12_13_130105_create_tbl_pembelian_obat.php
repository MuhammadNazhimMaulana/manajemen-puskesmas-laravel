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
            $table->float('ppn', 8, 2)->nullable();
            $table->integer('jumlah_bayar')->nullable();
            $table->string('foto_bukti_bayar_obat')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->date('tgl_tenggat')->nullable();
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
