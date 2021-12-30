<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianObat_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_pembelian_obat';

    // primary key
    protected $primaryKey = 'id_pembelian';

    // Fillable
    protected $fillable = ['user_id', 'transaksi_id', 'ppn', 'jumlah_bayar', 'foto_bukti_bayar_obat', 'tgl_bayar', 'tgl_tenggat', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksi_model()
    {
        return $this->belongsTo(Transaksi_Model::class, 'transaksi_id', 'id_transaksi');
    }

    // Inverse
    public function keranjangobat_model()
    {
        return $this->hasOne(KeranjangObat_Model::class, 'pembelian_id', 'id_pembelian');
    }

    public function penilaian_model()
    {
        return $this->hasOne(Penilaian_Model::class, 'pembelian_id', 'id_pembelian');
    }

    // Scope for searching
    public function scopeFilterPembelianObat($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_pembelian'] ?? false, function ($query, $cari_pembelian) {
            return $query->where('tgl_tenggat', 'like', '%' . $cari_pembelian . '%');
        });
    }
}
