<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Ruang_Model;

class Ruang_Controller_A extends Controller
{
    public function get_all()
    {

        $data = [
            "title" => "Ruang",
            "rooms" => Ruang_Model::filterRuang(request(['cari_ruang']))->paginate(5)
        ];

        return view('Admin/Ruang/view_ruang', $data);
    }

    public function create_ruang()
    {

        $data = [
            "title" => "Ruang",
        ];

        return view('Admin/Ruang/create_ruang', $data);
    }

    public function store_ruang(Request $request)
    {
        $validateRuang = $request->validate([
            'nama_ruang' => 'required',
            'kapasitas' => 'required'
        ]);

        Ruang_Model::create($validateRuang);

        return redirect('/ruang')->with('success', 'Ruang Baru Berhasil Ditambahkan');
    }

    public function delete_ruang(int $id)
    {

        Ruang_Model::where('id_ruang', $id)->delete();

        return redirect('/ruang')->with('danger', 'Ruang Baru Berhasil Dihapus');
    }
}
