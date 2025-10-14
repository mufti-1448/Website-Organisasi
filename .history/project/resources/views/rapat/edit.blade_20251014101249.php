@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rapat: {{ $rapat->judul }}</h2>

    <form action="{{ route('rapat.update', $rapat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Rapat</label>
            <input type="text" name="judul" class="form-control" value="{{ $rapat->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $rapat->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $rapat->tempat }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="belum" {{ $rapat->status == 'belum' ? 'selected' : '' }}>Belum</option>
                <option value="berlangsung" {{ $rapat->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                <option value="selesai" {{ $rapat->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" class="form-control" value="{{ $rapat->jumlah_peserta }}">
        </div>

        @if ($rapat->status === 'selesai')
            <hr>
            <div class="mb-3">
                <label>Upload File Notulen (PDF/DOC, opsional)</label>
                <input type="file" name="file_notulen" class="form-control" accept=".pdf,.doc,.docx">
            </div>

            <div class="mb-3">
                <label>Upload Dokumentasi (gambar, opsional)</label>
                <input type="file" name="file_dokumentasi[]" multiple class="form-control" accept="image/*">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('rapat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
