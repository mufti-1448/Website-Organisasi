@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-plus-circle"></i> Tambah Evaluasi</h3>
    <form action="{{ route('evaluasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID Evaluasi</label>
            <input type="text" name="id" class="form-control" value="{{ $nextId ?? 'EVAL001' }}" readonly>
        </div>

        <div class="mb-3">
            <label for="program_id" class="form-label">Program Kerja</label>
            <select name="program_id" class="form-select" required>
                <option value="">-- Pilih Program Kerja --</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Evaluasi</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Evaluasi</label>
            <textarea name="isi" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Evaluasi</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <select name="penulis" class="form-select" required>
                <option value="">-- Pilih Penulis --</option>
                @foreach ($anggota as $a)
                    <option value="{{ $a->nama }}">{{ $a->nama }} ({{ $a->jabatan }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload File (Opsional)</label>
            <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
        </div>

        <div class="d-flex gap-1">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
