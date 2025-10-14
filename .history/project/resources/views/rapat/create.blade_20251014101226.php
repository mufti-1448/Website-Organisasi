@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Rapat</h2>

    <form action="{{ route('rapat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul Rapat</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="belum">Belum</option>
                <option value="berlangsung">Berlangsung</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" class="form-control">
        </div>

        <hr>

        <div class="mb-3">
            <label>File Notulen (Opsional)</label>
            <input type="file" name="file_notulen" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <div class="mb-3">
            <label>Dokumentasi (Opsional, bisa lebih dari satu)</label>
            <input type="file" name="file_dokumentasi[]" multiple class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('rapat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
