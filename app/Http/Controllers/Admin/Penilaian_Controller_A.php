<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model
use App\Models\Penilaian_Model;

// Memanggil redis
use Illuminate\Support\Facades\Redis;

class Penilaian_Controller_A extends Controller
{
    public function get_all()
    {
        $cached = Redis::get('penilaian');

        if(isset($cached)) {
            $blog = json_decode($cached, FALSE);

            $data = [
                "title" => "List Penilaian",
                "penilaian" => $blog
            ];
            
            return view('Admin/Penilaian/view_penilaian', $data);

        }else {
            $penilaian = Penilaian_Model::orderBy('skor_pelayanan', 'asc')->get();

            Redis::set('penilaian', $penilaian, 'EX', 120);

            $data = [
                "title" => "List Penilaian",
                "penilaian" => $penilaian
            ];

            return view('Admin/Penilaian/view_penilaian', $data);
        }
    }
}
