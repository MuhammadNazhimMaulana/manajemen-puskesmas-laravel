<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Memanggil Model
use App\Models\{PembelianObat_Model, Transaksi_Model, KeranjangObat_Model, User};

class PembelianObat_Controller_U extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Pembelian Obat",
            "pembelian" => PembelianObat_Model::filterPembelianObat(request(['cari_pembelian']))->paginate(5)
        ];

        return view('User/Pembelian Obat/view_beliObatUser', $data);
    }


    public function store_pembelian_user(Request $request, Transaksi_Model $transaksi)
    {
        // Getting name of cashier kasir nanti bisa nullable
        $pengguna = $request->session()->get('pengguna');

        // Getting transaksi_id
        $transaksi_pengguna = $transaksi->where('user_id', $pengguna[2])->where('ket_pembayaran', 'Lunas')->first();

        if ($transaksi_pengguna == null) {
            return redirect('/pembelian_user')->with('gagal', 'Anda belum melakukan pemeriksaan');
        }

        // Data Pembelian
        $data_pembelian = [
            'user_id' => $pengguna[2],
            'transaksi_id' => $transaksi_pengguna->id_transaksi,
        ];


        $pembelian = PembelianObat_Model::create($data_pembelian);

        // Getting id pembelian obat
        $id_pembelian = $pembelian->id_pembelian;

        return redirect('/keranjang-obat-user/' . $id_pembelian)->with('success', 'Keranjang Baru Berhasil Dibuat');
    }
}
