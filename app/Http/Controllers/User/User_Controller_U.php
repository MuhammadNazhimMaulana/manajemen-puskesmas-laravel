<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class User_Controller_U extends Controller
{
    public function dashboard()
    {
        $data_user = session('pengguna')[0];

        $data = [
            "title" => "Dashboard User",
            "nama" => $data_user
        ];

        return view('User/Dashboard/dashboard_user', $data);
    }

    public function profile(User $user)
    {
        $data_user = session('pengguna')[2];

        $pengguna = $user->where('id', $data_user)->first();

        $data = [
            "title" => "Profile User",
            "pengguna" => $pengguna
        ];

        return view('User/Personal/profile', $data);
    }

    public function ubah_profile(User $user)
    {
        $data_user = session('pengguna')[2];

        $pengguna = $user->where('id', $data_user)->first();

        $data = [
            "title" => "Profile User",
            "pengguna" => $pengguna
        ];

        return view('User/Personal/ubah_profile_user', $data);
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

        return redirect('/profile')->with('success', 'Profile Baru Berhasil Diupdate');
    }
}
