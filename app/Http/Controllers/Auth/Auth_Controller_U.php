<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Auth};
use App\Models\User;

class Auth_Controller_U extends Controller
{
    public function login()
    {
        $data = [
            "title" => "Login User",
        ];

        return view('User/Authorisasi/login_user', $data);
    }

    public function register()
    {
        $data = [
            "title" => "Register User",
        ];

        return view('User/Authorisasi/register_user', $data);
    }
}
