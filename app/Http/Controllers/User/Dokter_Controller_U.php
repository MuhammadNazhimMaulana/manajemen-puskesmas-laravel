<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Dokter_Model;

class Dokter_Controller_U extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Dokter",
            "docters" => Dokter_Model::filterDokter(request(['cari_dokter']))->paginate(5)
        ];

        return view('User/Dokter/view_dokter_user', $data);
    }
}
