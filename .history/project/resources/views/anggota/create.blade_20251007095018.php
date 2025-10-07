@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<h2><i class="bi bi-plus-lg me-2"></i> Tambah Anggota</h2>
<hr>

<form action="{{ route('anggota.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i> Simpan</button>
    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
