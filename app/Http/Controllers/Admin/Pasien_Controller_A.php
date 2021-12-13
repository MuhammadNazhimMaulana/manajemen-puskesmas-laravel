<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{Pasien_Model, Obat_Model, Dokter_Model, Ruang_Model, Pendaftaran_Model, User};

class Pasien_Controller_A extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Pasien",
            "pasien" => Pasien_Model::filterPasien(request(['cari_pasien']))->paginate(5)
        ];

        return view('Admin/Pasien/view_pasien', $data);
    }

    public function create_pasien()
    {

        $data = [
            "title" => "Pasien",
            "users" => User::all(),
            "docters" => Dokter_Model::all(),
            "medicines" => Obat_Model::all(),
            "rooms" => Ruang_Model::all(),
            "registrations" => Pendaftaran_Model::all()
        ];

        return view('Admin/Pasien/create_pasien', $data);
    }

    public function store_pasien(Request $request)
    {

        $validatePasien = $request->validate([
            'user_id' => 'required',
            'dokter_id' => 'required',
            'ruang_id' => 'required',
            'daftar_id' => 'required',
            'obat_id' => 'required',
            'jadwal_periksa' => 'required',
            'keterangan' => 'required',
        ]);

        Pasien_Model::create($validatePasien);

        return redirect('/pasien')->with('success', 'Pasien Baru Berhasil Ditambahkan');
    }

    public function update_pasien(int $id)
    {
        $pasien = Pasien_Model::where('id_pasien', $id)->first();

        $data = [
            "title" => "Pasien",
            "pasien" => $pasien,
            "users" => User::all(),
            "docters" => Dokter_Model::all(),
            "medicines" => Obat_Model::all(),
            "rooms" => Ruang_Model::all(),
            "registrations" => Pendaftaran_Model::all()
        ];

        return view('Admin/Pasien/update_pasien', $data);
    }

    public function update_pasien_process(Request $request, int $id)
    {
        $pasien = Pasien_Model::where('id_pasien', $id)->first();

        $validatePasien = $request->validate([
            'user_id' => 'required',
            'dokter_id' => 'required',
            'ruang_id' => 'required',
            'daftar_id' => 'required',
            'obat_id' => 'required',
            'jadwal_periksa' => 'required',
            'keterangan' => 'required',
        ]);

        Pasien_Model::where('id_pasien', $pasien->id_pasien)
            ->update($validatePasien);

        return redirect('/pasien')->with('success', 'Pasien Baru Berhasil Diupdate');
    }

    public function delete_pasien(Pasien_Model $pasien, int $id)
    {
        // Getting specific data
        $pasien = $pasien->where('id_pasien', $id)->first();

        // Delete data from table
        Pasien_Model::where('id_pasien', $id)->delete();

        return redirect('/pasien')->with('danger', 'Pasien Berhasil Dihapus');
    }
}
