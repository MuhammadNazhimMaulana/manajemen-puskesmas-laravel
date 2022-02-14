<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

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

    public function create_transaksi(Request $request)
    {

        $data = [
            "title" => "Transaksi",
            "users" => User::all(),
            "pasien" => Pasien_Model::all(),
        ];

        return view('Admin/Transaksi/create_transaksi', $data);
    }

    public function store_transaksi(Request $request)
    {
        // Getting name of cashier
        $kasir = $request->session()->get('pengguna');

        $validateTransaksi = $request->validate([
            'user_id' => 'required',
            'pasien_id' => 'required',
            'biaya_pembayaran' => 'required',
            'tanggal_bayar' => 'required',
            'tenggat_pembayaran' => 'required',
        ]);

        if ($request->file('foto_bukti_bayar')) {
            $validateTransaksi['foto_bukti_bayar'] = $request->file('foto_bukti_bayar')->store('Foto Bukti Pembayaran');

            // Keterangan Lunas
            $validateTransaksi['ket_pembayaran'] = 1;
        } else {
            // Picture Empty
            $validateTransaksi['foto_bukti_bayar'] = 'Belum ada Bukti Pembayaran';
            $validateTransaksi['ket_pembayaran'] = 2;
        }

        // Nama Kasir
        $validateTransaksi['nama_kasir'] = $kasir[0];

        Transaksi_Model::create($validateTransaksi);

        return redirect('/transaksi')->with('success', 'Transaksi Baru Berhasil Ditambahkan');
    }

    public function update_transaksi(int $id)
    {

        $transaksi = Transaksi_Model::where('id_transaksi', $id)->first();

        $data = [
            "title" => "Transaksi",
            "transaksi" => $transaksi,
            "users" => User::all(),
            "pasien" => Pasien_Model::all(),
        ];

        return view('Admin/Transaksi/update_transaksi', $data);
    }


    public function update_transaksi_process(Request $request, int $id)
    {
        $transaksi = Transaksi_Model::where('id_transaksi', $id)->first();

        $validateTransaksi = $request->validate([
            'user_id' => 'required',
            'pasien_id' => 'required',
            'biaya_pembayaran' => 'required',
            'tanggal_bayar' => 'required',
            'tenggat_pembayaran' => 'required',
        ]);

        if ($request->file('foto_bukti_bayar')) {
            // Delete old picture
            if ($request->fotoTransaksiLama) {
                Storage::delete($request->fotoTransaksiLama);
            }

            $validateTransaksi['foto_bukti_bayar'] = $request->file('foto_bukti_bayar')->store('Foto Bukti Pembayaran');

            $validateTransaksi['ket_pembayaran'] = 1;
        }

        Transaksi_Model::where('id_transaksi', $transaksi->id_transaksi)
            ->update($validateTransaksi);

        return redirect('/transaksi')->with('success', 'Transaksi Baru Berhasil Diupdate');
    }

    public function delete_transaksi(Transaksi_Model $transaksi, int $id)
    {
        // Getting specific data
        $transaksi = $transaksi->where('id_transaksi', $id)->first();

        // Delete picture
        if ($transaksi->foto_bukti_bayar) {
            Storage::delete($transaksi->foto_bukti_bayar);
        }

        // Delete data from table
        Transaksi_Model::where('id_transaksi', $id)->delete();

        return redirect('/transaksi')->with('danger', 'Transaksi Berhasil Dihapus');
    }

    public function pdf_transaksi(int $id)
    {
        $laporan = Transaksi_Model::where('user_id', $id)->first();

        $data = [
            "title" => "Laporan Pengunjung",
            "laporan" => $laporan,
        ];

        // Calling DOMPDF
        $pdf = App::make('dompdf.wrapper');

        // Loading view using DOMPSDF
        $pdf->loadview('User/Transaksi/print_pdf_transaksi', $data)->setpaper('A4', 'portrait');

        // Showing The pdf
        return $pdf->stream('Transaksi');
    }
}
