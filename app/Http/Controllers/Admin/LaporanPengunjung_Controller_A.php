<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Calling Carbon
use Carbon\Carbon;

// Memanggil Model
use App\Models\{PembelianObat_Model, Transaksi_Model, Pasien_Model, LaporanPengunjung_Model, User};
use Illuminate\Support\Facades\App;

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

        $start_date = Carbon::now();

        // Getting first day of the month
        $first_day = $start_date->firstOfMonth();

        // Getting last day of the month
        $last_day = Carbon::now()->lastOfMonth();

        $data = [
            "title" => "Laporan Pengunjung",
            "users" => User::all(),
            "first_day" => $first_day->toDateString(),
            "last_period" => $last_day->toDateString(),
            "jml_pengunjung" => $jumlah_pasien,
            "jml_transaksi" => $jumlah_transaksi->jml_trans + $jumlah_transaksi_obat->jml_trans_obat
        ];

        return view('Admin/Laporan Pengunjung/create_laporan', $data);
    }

    public function store_laporan(Request $request)
    {

        $validateLaporan = $request->validate([
            'user_id' => 'required',
            'jumlah_pengunjung' => 'required',
            'jumlah_transaksi' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
        ]);

        LaporanPengunjung_Model::create($validateLaporan);

        return redirect('/laporan')->with('success', 'Laporan Baru Berhasil Ditambahkan');
    }

    public function update_laporan(int $id)
    {
        $laporan = LaporanPengunjung_Model::where('id_laporan', $id)->first();

        $data = [
            "title" => "Laporan Pengunjung",
            "laporan" => $laporan,
            "users" => User::all(),
        ];

        return view('Admin/Laporan Pengunjung/update_laporan', $data);
    }

    public function update_laporan_process(Request $request, int $id)
    {
        $laporan = LaporanPengunjung_Model::where('id_laporan', $id)->first();

        $validateLaporan = $request->validate([
            'user_id' => 'required',
            'jumlah_pengunjung' => 'required',
            'jumlah_transaksi' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
        ]);

        LaporanPengunjung_Model::where('id_laporan', $laporan->id_laporan)
            ->update($validateLaporan);

        return redirect('/laporan')->with('success', 'Laporan Berhasil Diupdate');
    }

    public function delete_laporan(LaporanPengunjung_Model $laporan, int $id)
    {
        // Getting specific data
        $report = $laporan->where('id_laporan', $id)->first();

        // Delete data from table
        LaporanPengunjung_Model::where('id_laporan', $report->id_laporan)->delete();

        return redirect('/laporan')->with('danger', 'Laporan Berhasil Dihapus');
    }

    public function pdf_laporan(int $id)
    {
        $laporan = LaporanPengunjung_Model::where('id_laporan', $id)->first();

        $data = [
            "title" => "Laporan Pengunjung",
            "laporan" => $laporan,
        ];

        // Calling DOMPDF
        $pdf = App::make('dompdf.wrapper');

        // Loading view using DOMPSDF
        $pdf->loadview('Admin/Laporan Pengunjung/print_pdf_laporan', $data)->setpaper('A4', 'portrait');

        // Showing The pdf
        return $pdf->stream('Laporan');
    }
}
