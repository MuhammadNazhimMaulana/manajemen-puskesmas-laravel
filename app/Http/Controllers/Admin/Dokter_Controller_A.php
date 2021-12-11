<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function update_dokter_process(Request $request, int $id)
    {
        $dokter = Dokter_Model::where('id_dokter', $id)->first();

        $validateDokter = $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'jadwal_hari' => 'required',
            'jadwal_waktu' => 'required',
            'foto_dokter' => 'image|file|max:1024'
        ]);

        if ($request->file('foto_dokter')) {
            // Delete old picture
            if ($request->fotoDokterLama) {
                Storage::delete($request->fotoDokterLama);
            }

            $validateDokter['foto_dokter'] = $request->file('foto_dokter')->store('Foto Dokter');
        }

        Dokter_Model::where('id_dokter', $dokter->id_dokter)
            ->update($validateDokter);

        return redirect('/dokter')->with('success', 'Dokter Baru Berhasil Diupdate');
    }

    public function delete_dokter(Dokter_Model $dokter, int $id)
    {
        // Getting specific data
        $dokter = $dokter->where('id_dokter', $id)->first();

        // Delete picture
        if ($dokter->foto_dokter) {
            Storage::delete($dokter->foto_dokter);
        }

        // Delete data from table
        Dokter_Model::where('id_dokter', $id)->delete();

        return redirect('/dokter')->with('danger', 'Dokter Baru Berhasil Dihapus');
    }
}
