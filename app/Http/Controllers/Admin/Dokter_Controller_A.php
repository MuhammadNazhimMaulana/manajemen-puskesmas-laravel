<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Dokter_Model;

class Dokter_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Dokter",
            "docters" => Dokter_Model::filterDokter(request(['cari_dokter']))->paginate(5)
        ];

        return view('Admin/Dokter/view_dokter', $data);
    }

    public function create_dokter()
    {

        $data = [
            "title" => "Dokter",
        ];

        return view('Admin/Dokter/create_dokter', $data);
    }

    public function store_dokter(Request $request)
    {

        $validateDokter = $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'jadwal_hari' => 'required',
            'jadwal_waktu' => 'required',
            'foto_dokter' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_dokter')) {
            $validateDokter['foto_dokter'] = $request->file('foto_dokter')->store('Foto Dokter');
        }

        Dokter_Model::create($validateDokter);

        return redirect('/dokter')->with('success', 'Dokter Baru Berhasil Ditambahkan');
    }

    public function update_dokter(int $id)
    {
        $dokter = Dokter_Model::where('id_dokter', $id)->first();

        $data = [
            "title" => "Dokter",
            "dokter" => $dokter
        ];

        return view('Admin/Dokter/update_dokter', $data);
    }
}
