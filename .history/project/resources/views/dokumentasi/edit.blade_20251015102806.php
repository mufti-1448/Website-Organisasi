@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Dokumentasi</h3>

    <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="rapat_id" class="form-label">Rapat</label>
            <select name="rapat_id" class="form-select" required>
                <option value="">-- Pilih Rapat --</option>
                @foreach($rapats as $r)
                    <option value="{{ $r->id }}" {{ $r->id == $dokumentasi->rapat_id ? 'selected' : '' }}>{{ $r->judul ?? $r->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="program_id" class="form-label">Program Kerja (Opsional)</label>
            <select name="program_id" class="form-select">
                <option value="">-- Pilih Program --</option>
                @foreach($programs as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $dokumentasi->program_id ? 'selected' : '' }}>{{ $p->nama ?? $p->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" value="{{ $dokumentasi->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control">{{ $dokumentasi->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $dokumentasi->tanggal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="{{ $dokumentasi->kategori }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto Baru (Opsional)</label>
            @if($dokumentasi->foto)
                <p>Foto saat ini: <img src="{{ asset('storage/' . $dokumentasi->foto) }}" alt="Foto Dokumentasi" style="max-width: 200px;"></p>
            @endif
            <input type="file" name="foto" class="form-control" accept="image/*">
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
