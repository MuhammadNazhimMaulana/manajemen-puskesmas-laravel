<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Obat_Model;

class Obat_Controller_U extends Controller
{

    public function get_all()
    {
        $data = [
            "title" => "Obat",
            "obat" => Obat_Model::filterObat(request(['cari_obat']))->paginate(5)
        ];

        return view('Admin/Obat/view_obat', $data);
    }
}
