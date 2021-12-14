<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{PembelianObat_Model, Transaksi_Model, KeranjangObat_Model, User};

class PembelianObat_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Pembelian Obat",
            "pembelian" => PembelianObat_Model::filterPembelianObat(request(['cari_pembelian']))->paginate(5)
        ];

        return view('Admin/Pembelian Obat/view_beliObat', $data);
    }
}
