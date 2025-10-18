@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Dokumentasi</h3>

    <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $dokumentasi->judul) }}" class="form-control @error('judul') is-invalid @enderror" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $dokumentasi->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $dokumentasi->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                <option value="Rapat" {{ old('kategori', $dokumentasi->kategori) == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                <option value="Program Kerja" {{ old('kategori', $dokumentasi->kategori) == 'Program Kerja' ? 'selected' : '' }}>Program Kerja</option>
                <option value="Lainnya" {{ old('kategori', $dokumentasi->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto Baru (Opsional)</label>
            @if($dokumentasi->foto)
                <p>Foto saat ini: <img src="{{ asset('storage/' . $dokumentasi->foto) }}" alt="Foto Dokumentasi" style="max-width: 200px;" class="img-thumbnail"></p>
            @endif
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
