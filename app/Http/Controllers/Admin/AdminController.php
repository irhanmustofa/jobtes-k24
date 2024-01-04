<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAdmin = User::where('level', 0)->where('id', '!=', auth()->user()->id)->get();

        return view('admin.data-admin', compact('dataAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:users,name'],
            'password' => ['required'],
        ]);
        $password = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'password' => $password,
            'level' => 0,
            'status' => 1,
        ]);

        return back()->with('status', 'success')->with('message', 'Data admin berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:users,name,' . $request->id],
        ]);
        $userAdmin = User::find($request->id);

        if ($request->password) {
            $password = Hash::make($request->password);

            $userAdmin->update([
                'name' => $request->name,
                'password' => $password,
                'status' => $request->status,
            ]);
        } else {
            $userAdmin->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
        }

        return back()->with('status', 'success')->with('message', 'Data admin berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $userAdmin = User::find($request->id);
        $userAdmin->delete();

        return back()->with('status', 'success')->with('message', 'Data admin berhasil dihapus');
    }
}