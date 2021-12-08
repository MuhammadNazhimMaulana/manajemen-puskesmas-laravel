<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Auth_Controller extends Controller
{
    public function login()
    {
        $data = [
            "title" => "Login",
        ];

        return view('Authorisasi/login_view', $data);
    }
}
