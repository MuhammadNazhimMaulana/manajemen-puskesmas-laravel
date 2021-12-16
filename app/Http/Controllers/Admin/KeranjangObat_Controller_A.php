<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Memanggil Model
use App\Models\{PembelianObat_Model, KeranjangObat_Model, Pasien_Model, Obat_Model};

class KeranjangObat_Controller_A extends Controller
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

        return view('Admin/Keranjang Obat/keranjang_obat', $data);
    }

    public function add_keranjang(Request $request)
    {
        $validateKeranjang = $request->validate([
            'obat_id' => 'required',
            'pembelian_id' => 'required',
            'pasien_id' => 'required',
            'jml_beli_obat' => 'required',
            'harga_obat' => 'required',
        ]);

        KeranjangObat_Model::create($validateKeranjang);

        return redirect('/keranjang-obat/' . $request->input('pembelian_id'))->with('success-tambah', 'Data Isi Keranjang Berhasil Ditambahkan');
    }

    // Getting the data of medicine
    public function action(Request $request)
    {
        if ($request->input('action')) {
            $action = $request->input('action');

            if ($action == 'get_cost') {

                $data = Obat_Model::where('id_obat', $request->input('obat_id'))->first();

                return response($data);
            }
        }
    }

    public function update_keranjang(Request $request, int $id)
    {
        $keranjang = KeranjangObat_Model::where('id_keranjang', $id)->first();

        $validateKeranjang = $request->validate([
            'obat_id' => 'required',
            'pembelian_id' => 'required',
            'pasien_id' => 'required',
            'jml_beli_obat' => 'required',
            'harga_obat' => 'required',
        ]);

        // Mendapatkan Harga
        $validateKeranjang['harga_obat'] = $request->input('harga_obat') * $request->input('jml_beli_obat');

        KeranjangObat_Model::where('id_keranjang', $keranjang->id_keranjang)
            ->update($validateKeranjang);

        return redirect('/keranjang-obat/' . $request->input('pembelian_id'))->with('success-update', 'Data Isi Keranjang Berhasil Diubah');
    }

    public function delete_keranjang(KeranjangObat_Model $keranjang, int $id, Request $request)
    {
        // Getting specific data
        $keranjang = $keranjang->where('id_keranjang', $id)->first();

        // Delete data from table
        $keranjang->where('id_keranjang', $id)->delete();

        return redirect('/keranjang-obat/' . $request->input('pembelian_id'))->with('danger', 'Data Keranjang Berhasil Dihapus');
    }
}
