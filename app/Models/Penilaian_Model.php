<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_penilaian';

    // primary key
    protected $primaryKey = 'id_penilaian';

    // Fillable
    protected $fillable = ['nama_penilai', 'user_id', 'skor_pelayanan', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope for searching
    public function scopeFilterPenilaian($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_nilai'] ?? false, function ($query, $cari_nilai) {
            return $query->where('nama_penilai', 'like', '%' . $cari_nilai . '%');
        });
    }
}
