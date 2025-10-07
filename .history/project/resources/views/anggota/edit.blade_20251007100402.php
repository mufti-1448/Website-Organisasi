@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
<h2><i class="bi bi-pencil-square me-2"></i> Edit Anggota</h2>
<hr>

<form action="{{ route('anggota.update', $anggotum->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ $anggota->jabatan }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $anggota->email }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}" required>
    </div>

    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Perbarui</button>
    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
