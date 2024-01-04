<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MemberProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userMember = $request->user();
        return view('member.profil', compact('userMember'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataUser = $request->user();

        $request->validate([
            'foto_profil' => ['image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ]);

        $oldImage = $dataUser->foto_profil;

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $newImage = time() . "_" . $file->getClientOriginalName();
            $request->file('foto_profil')->storeAs('public/img/foto-profil', $newImage);

            Storage::delete('public/img/foto-profil/' . $oldImage);
        } else {
            $newImage = $oldImage;
        }

        if ($request->password) {
            $password = Hash::make($request->password);

            $dataUser->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'gender' => $request->gender,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_ktp' => $request->no_ktp,
                'password' => $password,
                'foto_profil' => $newImage,
            ]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        } else {
            $dataUser->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'gender' => $request->gender,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_ktp' => $request->no_ktp,
                'foto_profil' => $newImage,
            ]);

            return back()->with('status', 'success')->with('message', 'Data berhasil diubah');
        }
    }
}