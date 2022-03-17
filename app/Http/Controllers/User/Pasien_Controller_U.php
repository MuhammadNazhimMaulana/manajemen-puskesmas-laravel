<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{Pasien_Model, Penilaian_Model, Dokter_Model, Ruang_Model, Pendaftaran_Model, User};

class Pasien_Controller_U extends Controller
{
    const KETERANGAN = 'PENDAFTARAN';

    public function get_all(Request $request)
    {
        // Getting name of cashier kasir nanti bisa nullable
        $pengguna = $request->session()->get('pengguna');

        $data = [
            "title" => "Pasien",
            "pasien" => Pasien_Model::filterPasien(request(['cari_pasien']))->where('user_id', $pengguna[2])->paginate(5)
        ];

        return view('User/Pasien/view_pasien_user', $data);
    }

    public function view_pasien(int $id)
    {
        $pasien = Pasien_Model::where('id_pasien', $id)->first();

        $penilaian = Penilaian_Model::where('pasien_id', $id)->where('selesai', true)->first();

        $data = [
            "title" => "Pasien",
            "pasien" => $pasien,
            "penilaian" => $penilaian
        ];

        return view('User/Pasien/view_pasien_specific_user', $data);
    }
}
