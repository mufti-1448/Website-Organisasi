@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Rapat</h3>

        <form action="{{ route('rapat.update', $rapat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">ID Rapat</label>
                <input type="text" class="form-control" value="{{ $rapat->id }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $rapat->judul }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $rapat->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat</label>
                <input type="text" name="tempat" class="form-control" value="{{ $rapat->tempat }}" required>
            </div>

            

            <div class="mb-3">
                <label for="keterangan" class="form-label">Status Rapat</label>
                <select name="keterangan" id="keterangan" class="form-select" required>
                    <option value="">-- Pilih Status Rapat --</option>
                    <option value="Belum Dimulai"
                        {{ old('keterangan', $rapat->keterangan ?? '') == 'Belum Dimulai' ? 'selected' : '' }}>Belum Dimulai
                    </option>
                    <option value="Sedang Berlangsung"
                        {{ old('keterangan', $rapat->keterangan ?? '') == 'Sedang Berlangsung' ? 'selected' : '' }}>Sedang
                        Berlangsung</option>
                    <option value="Selesai"
                        {{ old('keterangan', $rapat->keterangan ?? '') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>


            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Update
            </button>
            <a href="{{ route('rapat.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
@endsection
