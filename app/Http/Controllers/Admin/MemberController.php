<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMember = User::where('level', 1)->get();

        return view('admin.data-member', compact('dataMember'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'gender' => ['required'],
            'no_hp' => ['required'],
            'tanggal_lahir' => ['required'],
            'no_ktp' => ['required'],
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

        return back()->with('status', 'success')->with('message', 'Member berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email,' . $request->id],
        ]);
        $member = User::find($request->id);
        $oldImage = $member->foto_profil;
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

            $member->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_ktp' => $request->no_ktp,
                'password' => $password,
                'foto_profil' => $newImage,
                'status' => $request->status,

            ]);
        } else {
            $member->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_ktp' => $request->no_ktp,
                'foto_profil' => $newImage,
                'status' => $request->status,

            ]);
        }

        return back()->with('status', 'success')->with('message', 'Member berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        $user->delete();
        Storage::delete('public/img/foto-profil/' . $user->foto_profil);

        return back()->with('status', 'success')->with('message', 'Member berhasil dihapus');
    }

    public function viewJson()
    {
        $members = User::where('level', 1)->get();

        // return response()->json($members);
        $dataMember = response()->json($members);
        // dd($dataMember);
        return view('admin.list-member', compact('dataMember'));
    }
}