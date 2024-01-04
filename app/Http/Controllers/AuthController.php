<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'gender' => ['required'],
            'no_hp' => ['required'],
            'tanggal_lahir' => ['required'],
            'no_ktp' => ['required'],
            'foto_profil' => ['image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ]);

        $password = Hash::make($request->password);

        $newImage = "";
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $newImage = time() . "_" . $file->getClientOriginalName();
            $request->file('foto_profil')->storeAs('public/img/foto-profil', $newImage);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_ktp' => $request->no_ktp,
            'password' => $password,
            'foto_profil' => $newImage,
            'level' => 1,
            'status' => 1,
        ]);

        return redirect('login', )->with('status', 'success')->with('message', 'Akun anda berhasil dibuat, silahkan login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Cek login valid atau tidak
        if (Auth::attempt($credentials)) {
            // Cek apakah status user aktif atau tidak
            if (Auth::user()->status == 1) {
                // Cek apakah level user admin atau tidak
                if (Auth::user()->level == 1) {
                    return redirect('member-profil')->with('status', 'success')->with('message', 'Login berhasil');
                } else {
                    return redirect('login')->with('status', 'danger')->with('message', 'Anda bukan member');
                }
            } else {
                return redirect('login')->with('status', 'danger')->with('message', 'Akun anda tidak aktif');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Akun anda tidak terdaftar');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }



}