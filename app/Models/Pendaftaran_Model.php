<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran_Model extends Model
{
    // Nama Tabel
    protected $table = 'tbl_pendaftaran';

    // primary key
    protected $primaryKey = 'id_daftar';

    // Fillable
    protected $fillable = ['user_id', 'sakit', 'status_daftar', 'dokter_id', 'kebutuhan', 'created_at', 'updated_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dokter_model()
    {
        return $this->belongsTo(Dokter_Model::class, 'dokter_id', 'id_dokter');
    }

    // Scope for searching
    public function scopeFilterPendaftaran($query, array $fillters)
    {
        // Searching
        $query->when($fillters['cari_pendaftar'] ?? false, function ($query, $cari_pendaftar) {
            return $query->where('sakit', 'like', '%' . $cari_pendaftar . '%');
        });
    }
}
