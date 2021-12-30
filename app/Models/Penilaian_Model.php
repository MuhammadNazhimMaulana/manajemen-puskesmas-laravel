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
    protected $fillable = ['nama_penilai', 'user_id', 'transaksi_id', 'pembelian_id', 'skor_pelayanan', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksi_model()
    {
        return $this->belongsTo(Transaksi_Model::class, 'transaksi_id', 'id_transaksi');
    }

    public function pembelian_model()
    {
        return $this->belongsTo(PembelianObat_Model::class, 'pembelian_id', 'id_pembelian');
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
