<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_transaksi';

    // primary key
    protected $primaryKey = 'id_transaksi';

    // Fillable
    protected $fillable = ['user_id', 'pasien_id', 'biaya_pembayaran', 'nama_kasir', 'foto_bukti_bayar', 'ket_pembayaran', 'tanggal_bayar', 'tenggat_pembayaran', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pasien_model()
    {
        return $this->belongsTo(Pasien_Model::class, 'pasien_id', 'id_pasien');
    }

    // Scope for searching
    public function scopeFilterTransaksi($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_transaksi'] ?? false, function ($query, $cari_transaksi) {
            return $query->where('tenggat_pembayaran', 'like', '%' . $cari_transaksi . '%');
        });
    }
}
