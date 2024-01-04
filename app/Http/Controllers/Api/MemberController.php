<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index()
    {
        $dataMember = User::where('level', 1)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Member Berhasil Diambil',
            'data' => $dataMember
        ], 200);
    }
}