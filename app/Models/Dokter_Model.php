<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_dokter';

    // primary key
    protected $primaryKey = 'id_dokter';

    // Fillable
    protected $fillable = ['nama_dokter', 'spesialis', 'jadwal_hari', 'jadwal_waktu', 'foto_dokter', 'created_at', 'updated_at'];

    // Scope for searching
    public function scopeFilterDokter($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_dokter'] ?? false, function ($query, $cari_dokter) {
            return $query->where('nama_dokter', 'like', '%' . $cari_dokter . '%');
        });
    }
}
