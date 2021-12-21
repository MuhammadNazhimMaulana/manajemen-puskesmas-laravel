<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\User;

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
}
