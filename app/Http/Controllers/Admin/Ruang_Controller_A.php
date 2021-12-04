<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Ruang_Model;

class Ruang_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Ruang",
            "rooms" => Ruang_Model::all()
        ];

        return view('Admin/Ruang/view_ruang', $data);
    }
}
