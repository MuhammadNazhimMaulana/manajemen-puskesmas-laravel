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
            "title" => "Dokter"
        ];

        return view('Admin/Dokter/view_dokter', $data);
    }
}
