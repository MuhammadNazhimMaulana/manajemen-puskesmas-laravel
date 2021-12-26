<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Memanggil Model
use App\Models\{PembelianObat_Model, Transaksi_Model, KeranjangObat_Model, User};

class PembelianObat_Controller_U extends Controller
{
    public function get_all(Request $request)
    {
        // Getting name of cashier kasir nanti bisa nullable
        $pengguna = $request->session()->get('pengguna');

        $data = [
            "title" => "Pembelian Obat",
            "pembelian" => PembelianObat_Model::filterPembelianObat(request(['cari_pembelian']))->where('user_id', $pengguna[2])->paginate(5)
        ];

        return view('User/Pembelian Obat/view_beliObatUser', $data);
    }

    public function view_pembelian(int $id)
    {
        $pembelian = PembelianObat_Model::where('id_pembelian', $id)->first();

        $data = [
            "title" => "Pembelian",
            "pembelian" => $pembelian,
        ];

        return view('User/Pembelian Obat/view_user_specific_buy', $data);
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

        return redirect('/pembelian_user/payment/' . $pembelian->id_pembelian)->with('success', 'Berhasil isi Keranjang Tinggal Pembayaran');
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

        return view('User/Pembelian Obat/payment_obat_user', $data_pembelian);
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

        $data_pembelian['status_pembayaran'] = 'Menunggu Pembayaran';
        $data_pembelian['tgl_bayar'] = null;

        $pesan = $request->session()->flash('belum_lunas', 'Menunggu pembayaran Pengguna');

        PembelianObat_Model::where('id_pembelian', $pembelian->id_pembelian)
            ->update($data_pembelian);

        return redirect('/pembelian_user/pembayaran_obat/' . $pembelian->id_pembelian)->with($pesan);
    }

    public function pembayaran_obat(int $id)
    {
        // Getting value of transaction
        $transaksi = PembelianObat_Model::where('id_pembelian', $id)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transaksi->jumlah_bayar,
            ),
            'customer_details' => array(
                'first_name' => $transaksi->user->first_name,
                'last_name' => $transaksi->user->last_name,
                'email' => $transaksi->user->email,
                'phone' => $transaksi->user->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            "title" => "Transaksi",
            "transaksi" => $transaksi,
            "snapToken" => $snapToken,
            "params" => $params["transaction_details"]["order_id"]
        ];

        return view('User/Pembelian Obat/pembayaran_obat_user', $data);
    }
}
