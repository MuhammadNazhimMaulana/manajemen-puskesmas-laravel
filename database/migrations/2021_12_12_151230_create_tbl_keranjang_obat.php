<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKeranjangObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_keranjang_obat', function (Blueprint $table) {
            $table->id('id_keranjang');
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('pasien_id');
            $table->integer('jml_beli_obat');
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
        Schema::dropIfExists('tbl_keranjang_obat');
    }
}
