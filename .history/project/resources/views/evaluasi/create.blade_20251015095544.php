@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-plus-circle"></i> Tambah Evaluasi</h3>
    <form action="{{ route('evaluasi.store') }}" method="POST">
        @csrf

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
            <label for="tanggal" class="form-label">Tanggal Evaluasi</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="selesai">Selesai</option>
                <option value="revisi">Revisi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
