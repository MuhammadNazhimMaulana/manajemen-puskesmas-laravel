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

    // Relationships
    public function pasien_model()
    {
        return $this->hasOne(Pasien_Model::class, 'ruang_id', 'id_ruang');
    }

    // Scope for searching
    public function scopeFilterRuang($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_ruang'] ?? false, function ($query, $cari_ruang) {
            return $query->where('nama_ruang', 'like', '%' . $cari_ruang . '%');
        });
    }
}
