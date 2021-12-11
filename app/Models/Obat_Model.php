<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_obat';

    // primary key
    protected $primaryKey = 'id_obat';

    // Fillable
    protected $fillable = ['nama_obat', 'stok', 'tanggal_kadaluarsa', 'perusahaan', 'foto_obat', 'created_at', 'updated_at'];
}
