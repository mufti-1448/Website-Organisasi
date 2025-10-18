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

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Evaluasi</label>
            <input type="text" name="judul" class="form-control" value="{{ $evaluasi->judul }}" required>
        </div>

        {{-- Isi --}}
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Evaluasi</label>
            <textarea name="isi" class="form-control" rows="4" required>{{ $evaluasi->isi }}</textarea>
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Evaluasi</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $evaluasi->tanggal }}" required>
        </div>

        {{-- Penulis --}}
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <select name="penulis" class="form-select" required>
                <option value="">-- Pilih Penulis --</option>
                @foreach ($anggota as $a)
                    <option value="{{ $a->nama }}" {{ $evaluasi->penulis == $a->nama ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- File Upload --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload File (Opsional)</label>
            @if($evaluasi->file)
                <p>File saat ini: <a href="{{ asset('storage/'.$evaluasi->file) }}" target="_blank">Lihat File</a></p>
            @endif
            <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
        </div>

        <div class="d-flex gap-1">
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Perubahan</button>
            <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
