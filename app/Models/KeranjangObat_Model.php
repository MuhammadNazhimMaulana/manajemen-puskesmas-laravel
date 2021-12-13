<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangObat_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_keranjang_obat';

    // primary key
    protected $primaryKey = 'id_keranjang';

    // Fillable
    protected $fillable = ['obat_id', 'pembelian_id', 'pasien_id', 'jml_beli_obat', 'harga_obat', 'created_at', 'updated_at'];

    // Relationships
    public function obat_model()
    {
        return $this->belongsTo(Obat_Model::class, 'obat_id', 'id_obat');
    }

    public function pembelian_model()
    {
        return $this->belongsTo(Pembelian_Model::class, 'pembelian_id', 'id_pembelian');
    }

    public function pasien_model()
    {
        return $this->belongsTo(Pasien_Model::class, 'pasien_id', 'id_pasien');
    }

    // Scope for searching
    public function scopeFilterKeranjangObat($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_keranjang'] ?? false, function ($query, $cari_keranjang) {
            return $query->where('pasien_id', 'like', '%' . $cari_keranjang . '%');
        });
    }
}
