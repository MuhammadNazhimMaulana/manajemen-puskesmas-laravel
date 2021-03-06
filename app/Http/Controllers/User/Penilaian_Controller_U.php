<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\{Penilaian_Model, User};

class Penilaian_Controller_U extends Controller
{
    public function add_penilaian(Request $request, Penilaian_Model $model_penilaian)
    {

        $validatePenilaian = $request->validate([
            'nama_penilai' => 'required',
            'komentar' => 'required',
            'keterangan' => 'required',
            'user_id' => 'required',
            'pasien_id' => 'nullable',
            'transaksi_id' => 'nullable',
            'pembelian_id' => 'nullable',
            'skor_pelayanan' => 'required',
        ]);

        $model_penilaian::create($validatePenilaian);
        return redirect('/pembelian_user')->with('success-menilai', 'Terimakasih Atas Penilaiannya');
    }
}
