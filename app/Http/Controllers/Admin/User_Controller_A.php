<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User_Controller_A extends Controller
{
    public function dashboard()
    {
        $data = [
            "title" => "Dashboard",
        ];

        return view('Admin/Main/dashboard_admin', $data);
    }

    public function profile()
    {
        $data = [
            "title" => "Profile",
        ];

        return view('Admin/Personal/profile_admin', $data);
    }

    public function ubah_profile()
    {
        $data = [
            "title" => "Profile",
        ];

        return view('Admin/Personal/ubah_profile_admin', $data);
    }
}
