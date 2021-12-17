<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengunjung_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_laporan_pengunjung';

    // primary key
    protected $primaryKey = 'id_laporan';

    // Fillable
    protected $fillable = ['user_id', 'jumlah_pengunjung', 'jumlah_transaksi', 'periode_awal', 'periode_akhir', 'nama_admin', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope for searching
    public function scopeFilterLaporan($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_laporan'] ?? false, function ($query, $cari_laporan) {
            return $query->where('periode_awal', 'like', '%' . $cari_laporan . '%');
        });
    }
}
