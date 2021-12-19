<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Utama_Controller_U extends Controller
{
    public function main()
    {
        $data = [
            "title" => "Dashboard User",
        ];

        return view('User/utama', $data);
    }
}
