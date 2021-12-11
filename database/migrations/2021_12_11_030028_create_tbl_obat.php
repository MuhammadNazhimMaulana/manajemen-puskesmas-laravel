<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('nama_obat');
            $table->integer('stok');
            $table->date('tanggal_kadaluarsa');
            $table->string('perusahaan');
            $table->string('foto_obat');
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
        Schema::dropIfExists('tbl_obat');
    }
}
