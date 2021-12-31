<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\{Pendaftaran_Model, Dokter_Model, User};

class Pendaftaran_Controller_A extends Controller
{

    public function get_all()
    {
        $data = [
            "title" => "Pendaftaran",
            "pendaftar" => Pendaftaran_Model::filterPendaftaran(request(['cari_pendaftar']))->orderBy('kebutuhan', 'asc')->paginate(5)
        ];

        return view('Admin/Pendaftaran/view_pendaftaran', $data);
    }

    public function create_pendaftaran()
    {

        $data = [
            "title" => "Pendaftaran",
            "users" => User::all(),
            "docters" => Dokter_Model::all()
        ];

        return view('Admin/Pendaftaran/create_pendaftaran', $data);
    }

    public function store_pendaftaran(Request $request)
    {

        $validatePendaftaran = $request->validate([
            'user_id' => 'required',
            'dokter_id' => 'required',
            'sakit' => 'required',
            'kebutuhan' => 'required',
        ]);

        // Adding status
        $validatePendaftaran['status_daftar'] = 'Sedang Proses';

        Pendaftaran_Model::create($validatePendaftaran);

        return redirect('/pendaftaran')->with('success', 'Pendaftar Baru Berhasil Ditambahkan');
    }

    public function update_pendaftaran(int $id)
    {
        $pendaftaran = Pendaftaran_Model::where('id_daftar', $id)->first();

        $data = [
            "title" => "Pendaftaran",
            "pendaftaran" => $pendaftaran,
            "users" => User::all(),
            "docters" => Dokter_Model::all()
        ];

        return view('Admin/Pendaftaran/update_pendaftaran', $data);
    }

    public function update_pendaftaran_process(Request $request, int $id)
    {
        $pendaftaran = Pendaftaran_Model::where('id_daftar', $id)->first();

        $validatePendaftaran = $request->validate([
            'user_id' => 'required',
            'dokter_id' => 'required',
            'sakit' => 'required',
            'kebutuhan' => 'required',
        ]);

        Pendaftaran_Model::where('id_daftar', $pendaftaran->id_daftar)
            ->update($validatePendaftaran);

        return redirect('/pendaftaran')->with('success', 'Pendaftaran Baru Berhasil Diupdate');
    }

    public function delete_pendaftaran(Pendaftaran_Model $pendaftaran, int $id)
    {
        // Getting specific data
        $pendaftaran = $pendaftaran->where('id_daftar', $id)->first();

        // Delete data from table
        Pendaftaran_Model::where('id_daftar', $id)->delete();

        return redirect('/pendaftaran')->with('danger', 'Pendaftar Berhasil Dihapus');
    }
}
