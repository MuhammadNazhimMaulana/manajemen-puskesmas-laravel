<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// Memanggil Model
use App\Models\{PembelianObat_Model, Transaksi_Model, Pasien_Model, LaporanPengunjung_Model, User};

class LaporanPengunjung_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Laporan Pengunjung",
            "reports" => LaporanPengunjung_Model::filterLaporan(request(['car_laporan']))->paginate(5)
        ];

        return view('Admin/Laporan Pengunjung/view_laporan', $data);
    }

    public function create_laporan()
    {
        // Getting total of people who come
        $jumlah_pasien = Pasien_Model::select(DB::raw('count(id_pasien) as jml_pasien'))->first();

        // Getting total transaction
        $jumlah_transaksi = Transaksi_Model::select(DB::raw('count(id_transaksi) as jml_trans'))->first();

        // Getting total medicine transaction
        $jumlah_transaksi_obat = PembelianObat_Model::select(DB::raw('count(id_pembelian) as jml_trans_obat'))->first();

        $data = [
            "title" => "Laporan Pengunjung",
            "users" => User::all(),
            "jml_pengunjung" => $jumlah_pasien,
            "jml_transaksi" => $jumlah_transaksi->jml_trans + $jumlah_transaksi_obat->jml_trans_obat
        ];

        return view('Admin/Laporan Pengunjung/create_laporan', $data);
    }
}
