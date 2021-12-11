<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_pasien';

    // primary key
    protected $primaryKey = 'id_pasien';

    // Fillable
    protected $fillable = ['user_id', 'jadwal_periksa', 'dokter_id', 'ruang_id', 'daftar_id', 'obat_id', 'created_at', 'updated_at'];
}
