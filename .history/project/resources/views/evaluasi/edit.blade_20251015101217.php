@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Evaluasi</h3>

    <form action="{{ route('evaluasi.update', $evaluasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Dropdown Program Kerja --}}
        <div class="mb-3">
            <label for="program_id" class="form-label">Program Kerja</label>
            <select name="program_id" class="form-select" required>
                <option value="">-- Pilih Program Kerja --</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}" {{ $evaluasi->program_id == $program->id ? 'selected' : '' }}>
                        {{ $program->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Evaluasi</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $evaluasi->tanggal }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $evaluasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="selesai" {{ $evaluasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="revisi" {{ $evaluasi->status == 'revisi' ? 'selected' : '' }}>Revisi</option>
            </select>
        </div>

        {{-- Catatan --}}
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="4">{{ $evaluasi->catatan }}</textarea>
        </div>

        {{-- File Upload --}}
        <div class="mb-3">
            <label for="file_path" class="form-label">Upload File (Opsional)</label>
            @if($evaluasi->file_path)
                <p>File saat ini: <a href="{{ asset('storage/'.$evaluasi->file_path) }}" target="_blank">Lihat File</a></p>
            @endif
            <input type="file" name="file_path" id="file_path" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Perubahan</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
