@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-plus-circle"></i> Tambah Rapat</h3>

        <form action="{{ route('rapat.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">ID Rapat</label>
                <input type="text" name="id" class="form-control" value="{{ $nextCode }}" readonly>
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
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" name="jumlah_peserta" class="form-control" id="jumlah_peserta"
                    value="{{ old('jumlah_peserta', $rapat->jumlah_peserta ?? '') }}" min="0">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Rapat</label>
                <select class="form-select" name="status" id="status" required>
                    <option value="belum">Belum Dimulai</option>
                    <option value="berlangsung">Sedang Berlangsung</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>



            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="{{ route('rapat.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
@endsection
