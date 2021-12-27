<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{Pasien_Model, Obat_Model, Dokter_Model, Ruang_Model, Pendaftaran_Model, User};

class Pasien_Controller_U extends Controller
{
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
}
