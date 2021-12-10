<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Dokter_Model;

class Dokter_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Dokter",
            "docters" => Dokter_Model::filterDokter(request(['cari_dokter']))->paginate(5)
        ];

        return view('Admin/Dokter/view_dokter', $data);
    }

    public function create_dokter()
    {

        $data = [
            "title" => "Dokter",
        ];

        return view('Admin/Dokter/create_dokter', $data);
    }
}
