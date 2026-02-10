<?php

namespace App\Http\Controllers;

use App\Models\ProfilOrganisasi;
use Illuminate\Http\Request;

class ProfilOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = ProfilOrganisasi::first(); // Asumsi hanya satu record
        return view('profil_organisasi.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profil_organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        ProfilOrganisasi::create($request->only(['visi', 'misi']));

        return redirect()->route('profil-organisasi.index')->with('success', 'Profil Organisasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profil = ProfilOrganisasi::findOrFail($id);
        return view('profil_organisasi.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profil = ProfilOrganisasi::findOrFail($id);
        return view('profil_organisasi.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profil = ProfilOrganisasi::findOrFail($id);

        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $profil->update($request->only(['visi', 'misi']));

        return redirect()->route('profil-organisasi.index')->with('success', 'Profil Organisasi berhasil diperbarui.');
    }

    /**
