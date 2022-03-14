<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\{Pendaftaran_Model, Dokter_Model, User};

class Pendaftaran_Controller_U extends Controller
{
    public function get_all(Request $request)
    {
        // Getting name of cashier kasir nanti bisa nullable
        $pengguna = $request->session()->get('pengguna');

        $data = [
            "title" => "Pendaftaran",
            "pendaftar" => Pendaftaran_Model::filterPendaftaran(request(['cari_pendaftar']))->where('user_id', $pengguna[2])->paginate(5)
        ];

        return view('User/Pendaftaran/view_pendaftaran_user', $data);
    }

    // Get data dokter berdasarkan spesialis
    public function get_dokter(string $spesialis)
    {
        $docters = Dokter_Model::where('spesialis', $spesialis)->get();
        foreach($docters as $docter) {
        //   echo "<option value=${".$docter->id."}>${".$docter->kolomnamanya."}</option>";
          echo "<option value='" . $docter->id_dokter . "'>" .$docter->nama_dokter . "</option>";
        //   echo "<option value=${docter->id}>${docter->kolomnamanya}</option>";
        }
        die;
    }

    public function create_pendaftaran_user(Request $request)
    {
        // Getting name of cashier kasir nanti bisa nullable
        $pengguna = $request->session()->get('pengguna');

        $data = [
            "title" => "Pendaftaran",
            "user" => User::where('id', $pengguna[2])->first(),
            "docters" => Dokter_Model::select('spesialis')->distinct('spesialis')->get()
        ];

        // dd($data['docters']);
        return view('User/Pendaftaran/create_pendaftaran_user', $data);
    }

    public function store_pendaftaran_user(Request $request)
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

        return redirect('/pendaftaran_user')->with('success', 'Pendaftar Baru Berhasil Ditambahkan');
    }
}
