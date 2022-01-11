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

    public function forget_view()
    {
        $data = [
            "title" => "Lupa Password",
        ];

        return view('User/Authorisasi/lupa_user', $data);        
    }

    public function register()
    {
        $data = [
            "title" => "Register User",
        ];

        return view('User/Authorisasi/register_user', $data);
    }

    // Cek email yang dimasukkan apakah ada atau tidak
    public function forget_pass(Request $request, User $user)
    {
        $checkemail = $request->input('email');

        // Cek email
        if($user->where('email', $checkemail)->first())
        {
            $pengguna = $user->where('email', $checkemail)->first();

            $new_pass = [
                'password' => Hash::make($request->input('password'))
            ];

             // Ubah Password
            $user->where('id', $pengguna->id)->update($new_pass);

            return redirect('/login_user')->with('reset', 'Berhasil Ubah Password');
        }else{

            return back()->with('emailnotFound', 'Email yang dimasukkan tidak terdaftar');
        }
    }

    // Post Registrasi
    public function storeRegister(Request $request)
    {
        $registerData = $request->validate([
            'username' => 'required|min:3|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

        $registerData['password'] = Hash::make($registerData['password']);
        $registerData['role'] = 1;

        User::create($registerData);

        // Session
        $request->session()->flash('success', 'Registrasi telah Berhasil Silakan Login');

        // Redirect to Login
        return redirect('/login_user');
    }

    // Auth Login (Cek untuk Login)
    public function authLogin(Request $request, User $user)
    {
        $pengguna = $user->where('username', $request['username'])->first();

        $loginData = $request->validate([
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            // Store data in session
            $request->session()->put('pengguna', [$pengguna->first_name, $pengguna->username, $pengguna->id]);

            return redirect()->intended('/');
        }

        // Session
        $request->session()->flash('loginError', 'Login Gagal');

        return back();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login_user');
    }
}
