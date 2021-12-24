<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Memanggil Model
use App\Models\{PembelianObat_Model, KeranjangObat_Model, Pasien_Model, Obat_Model};

class KeranjangObat_Controller_U extends Controller
{
    public function keranjang_pembelian(int $id_pembelian)
    {
        // Total keranjang
        $total_beli = KeranjangObat_Model::select(DB::raw('SUM(harga_obat) AS jml_bayar'))->where('pembelian_id', $id_pembelian)->first();

        $data = [
            "title" => "Keranjang Pembelian Obat",
            "pembelian" => PembelianObat_Model::where('id_pembelian', $id_pembelian)->first(),
            "medicines" => Obat_Model::all(),
            "pasien" => Pasien_Model::all(),
            "carts" => KeranjangObat_Model::all(),
            "total_beli" => $total_beli
        ];

        return view('User/Keranjang Obat/keranjang_obat_user', $data);
    }
}
