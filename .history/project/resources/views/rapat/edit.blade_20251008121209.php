@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Rapat</h3>

        <form action="{{ route('rapat.update', $rapat->id) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Rapat</label>
                <input type="text" name="judul" value="{{ $rapat->judul }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $rapat->tanggal }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat</label>
                <input type="text" name="tempat" value="{{ $rapat->tempat }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" rows="4" class="form-control text-truncate-cell" required>{{ $rapat->keterangan }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('rapat.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
