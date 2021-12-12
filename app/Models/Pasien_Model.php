<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_pasien';

    // primary key
    protected $primaryKey = 'id_pasien';

    // Fillable
    protected $fillable = ['user_id', 'jadwal_periksa', 'dokter_id', 'ruang_id', 'daftar_id', 'obat_id', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dokter_model()
    {
        return $this->belongsTo(Dokter_Model::class, 'dokter_id', 'id_dokter');
    }

    public function ruang_model()
    {
        return $this->belongsTo(Ruang_Model::class, 'ruang_id', 'id_ruang');
    }

    public function pendaftaran_model()
    {
        return $this->belongsTo(Pendaftaran_Model::class, 'daftar_id', 'id_daftar');
    }

    public function obat_model()
    {
        return $this->belongsTo(Obat_Model::class, 'obat_id', 'id_obat');
    }

    // Scope for searching
    public function scopeFilterPasien($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_pasien'] ?? false, function ($query, $cari_pasien) {
            return $query->where('jadwal_periksa', 'like', '%' . $cari_pasien . '%');
        });
    }
}
