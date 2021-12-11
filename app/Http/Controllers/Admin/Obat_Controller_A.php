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
            'foto_obat' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_obat')) {
            $validateObat['foto_obat'] = $request->file('foto_obat')->store('Foto Obat');
        }

        Obat_Model::create($validateObat);

        return redirect('/obat')->with('success', 'Obat Baru Berhasil Ditambahkan');
    }
}
