<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User_Controller_A extends Controller
{
    public function dashboard()
    {
        $data = [
            "title" => "Ruang",
        ];

        return view('layouts/main', $data);
    }
}
