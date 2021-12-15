<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

// Memanggil Model
use App\Models\Obat_Model;

class Obat_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Obat",
            "obat" => Obat_Model::filterObat(request(['cari_obat']))->paginate(5)
        ];

        return view('Admin/Obat/view_obat', $data);
    }

    public function create_obat()
    {
        $nama_obat = Http::get("http://jsonplaceholder.typicode.com/posts");

        $data = [
            "title" => "Obat",
            "medicines" => json_decode($nama_obat)
        ];

        return view('Admin/Obat/create_obat', $data);
    }

    public function store_obat(Request $request)
    {

        $validateObat = $request->validate([
            'nama_obat' => 'required',
            'stok' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'perusahaan' => 'required',
            'harga_satuan' => 'required',
            'foto_obat' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_obat')) {
            $validateObat['foto_obat'] = $request->file('foto_obat')->store('Foto Obat');
        }

        Obat_Model::create($validateObat);

        return redirect('/obat')->with('success', 'Obat Baru Berhasil Ditambahkan');
    }

    public function update_obat(int $id)
    {
        // Link dapatkan data
        $nama_obat = Http::get("http://jsonplaceholder.typicode.com/posts");

        $obat = Obat_Model::where('id_obat', $id)->first();

        $data = [
            "title" => "Obat",
            "obat" => $obat,
            "medicines" => json_decode($nama_obat)
        ];

        return view('Admin/Obat/update_obat', $data);
    }

    public function update_obat_process(Request $request, int $id)
    {
        $obat = Obat_Model::where('id_obat', $id)->first();

        $validateObat = $request->validate([
            'nama_obat' => 'required',
            'stok' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'perusahaan' => 'required',
            'harga_satuan' => 'required',
            'foto_obat' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_obat')) {
            // Delete old picture
            if ($request->fotoObatLama) {
                Storage::delete($request->fotoObatLama);
            }

            $validateObat['foto_obat'] = $request->file('foto_obat')->store('Foto Obat');
        }

        Obat_Model::where('id_obat', $obat->id_obat)
            ->update($validateObat);

        return redirect('/obat')->with('success', 'Obat Baru Berhasil Diupdate');
    }


    public function delete_obat(Obat_Model $obat, int $id)
    {
        // Getting specific data
        $obat = $obat->where('id_obat', $id)->first();

        // Delete picture
        if ($obat->foto_obat) {
            Storage::delete($obat->foto_obat);
        }

        // Delete data from table
        Obat_Model::where('id_obat', $id)->delete();

        return redirect('/obat')->with('danger', 'Obat Baru Berhasil Dihapus');
    }

    public function action(Request $request)
    {
        if ($request->input('action')) {
            $action = $request->input('action');

            if ($action == 'get_harga_obat') {

                $data = Http::get("http://jsonplaceholder.typicode.com/posts?title=" . $request->input('nama_obat'));

                return response()->json([
                    'data_obat' => json_decode($data)
                ]);
            }
        }
    }
}
