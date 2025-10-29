<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SppController extends Controller
{
    public function index()
    {
        $data = DB::table('spp')->get();
        return view('admin.spp', compact('data'));
    }

    public function tambahSPP() {
        // return view('admin.spp.tambah');
    }
}
