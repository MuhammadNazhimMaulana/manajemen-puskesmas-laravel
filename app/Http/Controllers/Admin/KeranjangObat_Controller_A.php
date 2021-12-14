<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\{PembelianObat_Model, KeranjangObat_Model, Pasien_Model, Obat_Model};

class KeranjangObat_Controller_A extends Controller
{
    public function keranjang_pembelian(int $id_pembelian)
    {
        $data = [
            "title" => "Keranjang Pembelian Obat",
            "pembelian" => PembelianObat_Model::where('id_pembelian', $id_pembelian)->first(),
            "medicines" => Obat_Model::all(),
            "pasien" => Pasien_Model::all()
        ];

        return view('Admin/Keranjang Obat/keranjang_obat', $data);
    }

    public function add_keranjang()
    {
    }
}
