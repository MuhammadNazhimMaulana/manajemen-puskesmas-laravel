<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_ruang';

    // primary key
    protected $primaryKey = 'id_ruang';

    // Fillable
    protected $fillable = ['nama_ruang', 'kapasitas', 'foto_ruang', 'created_at', 'updated_at'];
}
