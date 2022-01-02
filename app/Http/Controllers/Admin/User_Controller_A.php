<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// Model
use App\Models\{User, Transaksi_Model, Penilaian_Model, Pasien_Model};

use Illuminate\Support\Facades\Hash;

class User_Controller_A extends Controller
{
    public function dashboard()
    {
        $model_transaksi = new Transaksi_Model();
        $model_pasien = new Pasien_Model();
        $mode_penilaian = new Penilaian_Model();

        $transaksi_per_kategori = $model_transaksi->select(DB::raw('COUNT(tbl_transaksi.id_transaksi) AS jumlah'), DB::raw('users.first_name AS pengguna'))
            ->join('users', 'tbl_transaksi.user_id', '=', 'users.id')
            ->groupBy('first_name')
            ->get();

        $pasien_per_kategori = $model_pasien->select(DB::raw('COUNT(tbl_pasien.id_pasien) AS jumlah'), DB::raw('users.first_name AS pengguna'))
            ->join('users', 'tbl_pasien.user_id', '=', 'users.id')
            ->groupBy('first_name')
            ->get();

        $penilaian = $mode_penilaian->select(DB::raw('COUNT(tbl_penilaian.id_penilaian) AS jumlah'))
            ->get();

        $data = [
            "title" => "Dashboard",
            "transaksi_per_kategori" => $transaksi_per_kategori,
            "pasien_per_kategori" => $pasien_per_kategori,
            "penilaian" => $penilaian,
        ];

        return view('Admin/Main/dashboard_admin', $data);
    }

    public function profile(Request $request)
    {
        // Getting name of cashier
        $nama = $request->session()->get('pengguna');

        // Getting User Data
        $data_user = User::where('id', $nama[2])->first();

        $data = [
            "title" => "Profile",
            "pengguna" => $data_user
        ];

        return view('Admin/Personal/profile_admin', $data);
    }

    public function ubah_profile(Request $request)
    {
        // Getting name of User
        $nama = $request->session()->get('pengguna');

        // Getting User Data
        $data_user = User::where('id', $nama[2])->first();

        $data = [
            "title" => "Profile",
            "pengguna" => $data_user
        ];

        return view('Admin/Personal/ubah_profile_admin', $data);
    }

    public function proses_ubah(Request $request)
    {
        // Getting name of User
        $nama = $request->session()->get('pengguna');

        if ($request["password"] == null) {
            // Password tidak diubah
            $request["password"] = $request["old_password"];
        } else {
            // Password diubah
            $request["password"] = Hash::make($request["passsword"]);
        }

        $updateProfile = $request->validate([
            'username' => 'required|min:3|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        User::where('id', $nama[2])->update($updateProfile);

        return redirect('/admin/profile')->with('success', 'Profile Baru Berhasil Diupdate');
    }
}
