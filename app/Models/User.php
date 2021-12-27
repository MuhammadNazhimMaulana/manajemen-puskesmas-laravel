<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'no_hp',
        'username',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Inverse Relationships
    public function laporan_model()
    {
        return $this->hasOne(LaporanPengunjung_Model::class, 'user_id');
    }

    public function pendaftaran_model()
    {
        return $this->hasOne(Pendaftaran_Model::class, 'user_id');
    }

    public function pembelianobat_model()
    {
        return $this->hasOne(PembelianObat_Model::class, 'user_id');
    }

    public function pasien_model()
    {
        return $this->hasOne(Pasien_Model::class, 'user_id');
    }

    public function transaksi_model()
    {
        return $this->hasOne(Transaksi_Model::class, 'user_id');
    }

    public function penilaian_model()
    {
        return $this->hasOne(Penilaian_Model::class, 'user_id');
    }
}
