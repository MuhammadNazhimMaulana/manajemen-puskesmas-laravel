<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function update_ruang(int $id)
    {
        $ruang = Ruang_Model::where('id_ruang', $id)->first();

        $data = [
            "title" => "Ruang",
            "ruang" => $ruang
        ];

        return view('Admin/Ruang/update_ruang', $data);
    }

    public function update_ruang_process(Request $request, int $id)
    {
        $room = Ruang_Model::where('id_ruang', $id)->first();

        $validateRuang = $request->validate([
            'nama_ruang' => 'required',
            'kapasitas' => 'required',
            'foto_ruang' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_ruang')) {
            // Delete old picture
            if ($request->fotoRuangLama) {
                Storage::delete($request->fotoRuangLama);
            }
            $validateRuang['foto_ruang'] = $request->file('foto_ruang')->store('Foto Ruang');
        }

        Ruang_Model::where('id_ruang', $room->id_ruang)
            ->update($validateRuang);

        return redirect('/ruang')->with('success', 'Ruang Baru Berhasil Diupdate');
    }

    public function store_ruang(Request $request)
    {

        $validateRuang = $request->validate([
            'nama_ruang' => 'required',
            'kapasitas' => 'required',
            'foto_ruang' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_ruang')) {
            $validateRuang['foto_ruang'] = $request->file('foto_ruang')->store('Foto Ruang');
        }

        Ruang_Model::create($validateRuang);

        return redirect('/ruang')->with('success', 'Ruang Baru Berhasil Ditambahkan');
    }

    public function delete_ruang(Ruang_Model $ruang, int $id)
    {
        // Getting specific data
        $room = $ruang->where('id_ruang', $id)->first();

        // Delete picture
        if ($room->foto_ruang) {
            Storage::delete($room->foto_ruang);
        }

        // Delete data from table
        Ruang_Model::where('id_ruang', $id)->delete();

        return redirect('/ruang')->with('danger', 'Ruang Baru Berhasil Dihapus');
    }
}
