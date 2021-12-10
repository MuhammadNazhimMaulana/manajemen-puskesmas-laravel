<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Auth};
use App\Models\User;

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

    // Post Registrasi
    public function storeRegister(Request $request)
    {
        $registerData = $request->validate([
            'username' => 'required|min:3|max:255',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

        $registerData['password'] = Hash::make($registerData['password']);
        $registerData['role'] = 1;

        User::create($registerData);

        // Session
        $request->session()->flash('success', 'Registrasi tekah Berhasil Silakan Login');

        // Redirect to Login
        return redirect('/login');
    }

    // Auth Login (Cek untuk Login)
    public function authLogin(Request $request)
    {
        $loginData = $request->validate([
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
