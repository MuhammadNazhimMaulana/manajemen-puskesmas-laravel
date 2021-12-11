<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_pasien';

    // primary key
    protected $primaryKey = 'id_pasien';

    // Fillable
    protected $fillable = ['user_id', 'sakit', 'dokter_id', 'kebutuhan', 'created_at', 'updated_at'];
}
