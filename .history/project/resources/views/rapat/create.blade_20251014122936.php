@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-plus-circle"></i> Tambah Rapat</h3>

    <form action="{{ route('rapat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID Rapat</label>
            <input type="text" class="form-control" value="{{ $nextCode }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat</label>
            <input type="text" name="tempat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="belum">Belum</option>
                <option value="berlangsung">Berlangsung</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        <a href="{{ route('rapat.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </form>
</div>
@endsection
