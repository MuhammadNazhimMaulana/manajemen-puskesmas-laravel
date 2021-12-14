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


    public function store_pembelian(Request $request, Transaksi_Model $transaksi)
    {
        // Getting name of cashier
        $kasir = $request->session()->get('pengguna');

        // Getting transaksi_id
        $transaksi_pengguna = $transaksi->where('user_id', $kasir[2])->where('ket_pembayaran', 'Lunas')->first();

        // Data Pembelian
        $data_pembelian = [
            'user_id' => $kasir[2],
            'transaksi_id' => $transaksi_pengguna->id_transaksi,
        ];


        $pembelian = PembelianObat_Model::create($data_pembelian);

        // Getting id pembelian obat
        $id_pembelian = $pembelian->id_pembelian;

        return redirect('/keranjang-obat/' . $id_pembelian)->with('success', 'Keranjang Baru Berhasil Dibuat');
    }
}
