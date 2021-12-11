<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pendaftaran', function (Blueprint $table) {
            $table->id('id_daftar');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dokter_id');
            $table->text('sakit');
            $table->enum('kebutuhan', ['Urgent', 'Tidak Urgent']);
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
        Schema::dropIfExists('tbl_pendaftaran');
    }
}
