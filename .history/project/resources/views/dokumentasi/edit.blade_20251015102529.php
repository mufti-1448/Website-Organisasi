@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-plus-circle"></i> Tambah Dokumentasi</h3>

    <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="rapat_id" class="form-label">Rapat</label>
            <select name="rapat_id" class="form-select" required>
                <option value="">-- Pilih Rapat --</option>
                @foreach($rapats as $r)
                    <option value="{{ $r->id }}">{{ $r->judul ?? $r->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="program_id" class="form-label">Program Kerja (Opsional)</label>
            <select name="program_id" class="form-select">
                <option value="">-- Pilih Program --</option>
                @foreach($programs as $p)
                    <option value="{{ $p->id }}">{{ $p->nama ?? $p->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
