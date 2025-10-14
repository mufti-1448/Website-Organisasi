<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use Illuminate\Support\Facades\DB;

class RapatController extends Controller
{
    /**
     * Tampilkan semua data rapat
     */
    public function index()
    {
        $rapat = Rapat::with(['notulen', 'dokumentasi'])->get();
        return view('rapat.index', compact('rapat'));
    }

    /**
     * Form tambah data rapat baru
     */
    public function create()
    {
        // Generate ID otomatis RPT001, RPT002, dst
        $lastRapat = Rapat::orderBy('id', 'desc')->first();
        $nextCode = "RPT001";

        if ($lastRapat) {
            $lastNumber = (int) substr($lastRapat->id, 3);
            $nextCode = 'RPT' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        return view('rapat.create', compact('nextCode'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
