<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Ruang_Model;

class Ruang_Controller_U extends Controller
{

    public function get_all()
    {

        $data = [
            "title" => "Ruang",
            "rooms" => Ruang_Model::filterRuang(request(['cari_ruang']))->paginate(5)
        ];

        return view('Admin/Ruang/view_ruang', $data);
    }
}
