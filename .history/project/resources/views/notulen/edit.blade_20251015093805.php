@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Notulen</h3>

    <form action="{{ route('notulen.update', $notulen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="rapat_id" class="form-label">Pilih Rapat</label>
            <select name="rapat_id" id="rapat_id" class="form-select" required>
                @foreach ($rapats as $rapat)
                    <option value="{{ $rapat->id }}" {{ $rapat->id == $notulen->rapat_id ? 'selected' : '' }}>
                        {{ $rapat->judul ?? $rapat->nama ?? $rapat->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="program_id" class="form-label">Pilih Program Kerja</label>
            <select name="program_id" id="program_id" class="form-select">
                <option value="">-- Pilih Program (Opsional) --</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}" {{ $program->id == $notulen->program_id ? 'selected' : '' }}>
                        {{ $program->nama_program ?? $program->judul_program ?? $program->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="penulis_id" class="form-label">Penulis</label>
            <select name="penulis_id" id="penulis_id" class="form-select" required>
                @foreach ($penulis as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $notulen->penulis_id ? 'selected' : '' }}>
                        {{ $p->nama ?? $p->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Notulen</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $notulen->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Notulen</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ $notulen->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file_path" class="form-label">Upload File (Opsional)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
            @if ($notulen->file_path)
                <p class="mt-2">File saat ini:
                    <a href="{{ asset('storage/' . $notulen->file_path) }}" target="_blank">📄 Lihat File</a>
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
