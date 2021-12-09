<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Auth_Controller extends Controller
{
    public function login()
    {
        $data = [
            "title" => "Login",
        ];

        return view('Authorisasi/login_view', $data);
    }

    public function register()
    {
        $data = [
            "title" => "Register",
        ];

        return view('Authorisasi/register_view', $data);
    }

    public function storeRegister(Request $request)
    {
        $registerData = $request->validate([
            'username' => 'required|min:3|max:255',
            'secret' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

        $registerData['password'] = Hash::make($$registerData['password']);

        User::create($registerData);

        // Session
        $request->session()->flash('success', 'Registrasi tekah Berhasil Silakan Login');

        // Redirect to Login
        return redirect('/login');
    }
}
