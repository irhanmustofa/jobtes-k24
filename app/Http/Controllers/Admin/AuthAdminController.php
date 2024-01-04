<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthAdminController extends Controller
{
    public function login()
    {
        return view('admin.login-admin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        // Cek login valid atau tidak
        if (Auth::attempt($credentials)) {
            // Cek apakah status user aktif atau tidak
            if (Auth::user()->status == 1) {
                // Cek apakah level user admin atau tidak
                if (Auth::user()->level == 0) {
                    return redirect('admin-dashboard')->with('status', 'success')->with('message', 'Login berhasil');
                } else {
                    return redirect('loginAdmin')->with('status', 'danger')->with('message', 'Anda bukan admin');
                }
            } else {
                return redirect('loginAdmin')->with('status', 'danger')->with('message', 'Akun anda tidak aktif');
            }
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Akun anda tidak terdaftar');
        return redirect('loginAdmin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flash('status', 'success');
        Session::flash('message', 'Logout berhasil');

        return redirect('admin');
    }
}