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

    // Inverse Relationships
    public function pasien_model()
    {
        return $this->hasOne(Pasien_Model::class, 'obat_id', 'id_obat');
    }

    public function keranjangobat_model()
    {
        return $this->hasOne(KeranjangObat_Model::class, 'obat_id', 'id_obat');
    }

    // Scope for searching
    public function scopeFilterObat($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_obat'] ?? false, function ($query, $cari_obat) {
            return $query->where('nama_obat', 'like', '%' . $cari_obat . '%');
        });
    }
}
