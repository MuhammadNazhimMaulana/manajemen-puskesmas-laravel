<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

    public function payment(int $id, Request $request)
    {
        $pembelian = PembelianObat_Model::where('id_pembelian', $id)->first();

        $data_pembelian = [
            'user_id' => $pembelian->user_id,
            'transaksi_id' => $pembelian->transaksi_id,
            'jumlah_bayar' => $request->input('jml_bayaran'),
        ];

        PembelianObat_Model::where('id_pembelian', $pembelian->id_pembelian)
            ->update($data_pembelian);

        return redirect('/pembelian/payment/' . $pembelian->id_pembelian)->with('success', 'Berhasil isi Keranjang Tinggal Pembayaran');
    }

    public function payment_view(int $id, Carbon $carbon)
    {
        $pembelian = PembelianObat_Model::where('id_pembelian', $id)->first();

        // Today's Date
        $today = $carbon->today()->toDateString();

        // Deafult Deadline
        $deadline = $carbon->tomorrow()->toDateString();

        $data_pembelian = [
            "pembelian" => $pembelian,
            "today" => $today,
            "deadline" => $deadline,
            "title" => "Pembelian Obat"
        ];

        return view('Admin/Pembelian Obat/payment_obat', $data_pembelian);
    }

    public function payment_process(int $id, Request $request)
    {

        $pembelian = PembelianObat_Model::where('id_pembelian', $id)->first();

        $data_pembelian = [
            'user_id' => $pembelian->user_id,
            'transaksi_id' => $pembelian->transaksi_id,
            'ppn' => $request->input('ppn'),
            'tgl_bayar' => $request->input('tgl_bayar'),
            'tgl_tenggat' => $request->input('tgl_tenggat'),
            'jumlah_bayar' => $request->input('jumlah_bayar'),
        ];

        if ($request->input('bayar') == "Bayar Kasir") {

            $data_pembelian['status_pembayaran'] = 'Lunas';

            $pesan = $request->session()->flash('lunas', 'Pembayaran Berhasil dan Transaksi Selesai');

            // Kalau pilih bayar mandiri
        } else {
            $data_pembelian['status_pembayaran'] = 'Menunggu Pembayaran';
            $data_pembelian['tgl_bayar'] = null;

            $pesan = $request->session()->flash('belum_lunas', 'Menunggu pembayaran Pengguna');
        }

        PembelianObat_Model::where('id_pembelian', $pembelian->id_pembelian)
            ->update($data_pembelian);

        return redirect('/pembelian')->with($pesan);
    }
}
