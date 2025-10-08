@extends('layouts.app')

@section('content')
    <style>
        .text-truncate-cell {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 250px;
            /* ubah sesuai kebutuhan */
        }
    </style>
    <div class="container mt-4">
        <h3><i class="bi bi-plus-circle"></i> Tambah Rapat Baru</h3>

        <form action="{{ route('rapat.store') }}" method="POST" class="mt-3">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode Rapat</label>
                <input type="text" class="form-control" value="{{ $nextCode }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Rapat</label>
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
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" rows="4" class="form-control text-truncate-cell" required></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('rapat.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
