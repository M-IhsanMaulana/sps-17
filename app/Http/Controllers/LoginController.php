<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                Alert::success('Selamat Datang');
                return redirect()->route('admin.home')->with('success', 'Berhasil Masuk');
            } else if (auth()->user()->role == 'petugas') {
                return redirect()->route('petugas.home');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Wrong email or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login')->with('success', 'Success');
    }
}
