<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{Transaksi_Model, Pasien_Model, User};

class Transaksi_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Transaksi",
            "transaksi" => Transaksi_Model::filterTransaksi(request(['cari_transaksi']))->paginate(5)
        ];

        return view('Admin/Transaksi/view_transaksi', $data);
    }
}
