<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\{Pendaftaran_Model, Dokter_Model, User};

class Pendaftaran_Controller_U extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Pendaftaran",
            "pendaftar" => Pendaftaran_Model::filterPendaftaran(request(['cari_pendaftar']))->paginate(5)
        ];

        return view('Admin/Pendaftaran/view_pendaftaran', $data);
    }

    public function mendaftar()
    {

        $data = [
            "title" => "Pendaftaran",
            "users" => User::all(),
            "docters" => Dokter_Model::all()
        ];

        return view('Admin/Pendaftaran/create_pendaftaran', $data);
    }
}
