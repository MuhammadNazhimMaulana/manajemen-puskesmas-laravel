<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{Pasien_Model, Obat_Model, Dokter_Model, Ruang_Model, Pendaftaran_Model, User};

class Pasien_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Pasien",
            "pasien" => Pasien_Model::filterPasien(request(['cari_pasien']))->paginate(5)
        ];

        return view('Admin/Pasien/view_pasien', $data);
    }

    public function create_pasien()
    {

        $data = [
            "title" => "Pasien",
            "users" => User::all(),
            "docters" => Dokter_Model::all(),
            "medicines" => Obat_Model::all(),
            "rooms" => Ruang_Model::all(),
            "registrations" => Pendaftaran_Model::all()
        ];

        return view('Admin/Pasien/create_pasien', $data);
    }
}
