@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-journal-text"></i> Tambah Notulen</h3>

    <form action="{{ route('notulen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="rapat_id" class="form-label">Pilih Rapat</label>
            <select name="rapat_id" id="rapat_id" class="form-select" required>
                <option value="">-- Pilih Rapat --</option>
                @foreach ($rapats as $rapat)
                    <option value="{{ $rapat->id }}">{{ $rapat->nama ?? $rapat->judul ?? 'Rapat #' . $rapat->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="program_id" class="form-label">Pilih Program Kerja</label>
            <select name="program_id" id="program_id" class="form-select">
                <option value="">-- Pilih Program (Opsional) --</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->nama ?? $program->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="penulis_id" class="form-label">Penulis</label>
            <select name="penulis_id" id="penulis_id" class="form-select" required>
                <option value="">-- Pilih Penulis --</option>
                @foreach ($penulis as $a)
                    <option value="{{ $a->id }}">{{ $a->nama ?? $a->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Notulen</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Notulen</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="file_path" class="form-label">Upload File (Opsional)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
