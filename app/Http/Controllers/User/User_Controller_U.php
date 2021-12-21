<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User_Controller_U extends Controller
{
    public function dashboard()
    {
        $data = [
            "title" => "Dashboard User",
        ];

        return view('User/Dashboard/dashboard_user', $data);
    }
}
