@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Notulen</h3>

    <form action="{{ route('notulen.update', $notulen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Rapat</label>
            <input type="text" class="form-control" value="{{ $notulen->rapat->judul ?? '-' }}" readonly>
        </div>

        <div class="mb-3">
            <label>Program Kerja (opsional)</label>
            <select name="program_id" class="form-control">
                <option value="">-- Tidak ada --</option>
                @foreach($programKerja as $p)
                    <option value="{{ $p->id }}" {{ $notulen->program_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <select name="penulis_id" class="form-control" required>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ $notulen->penulis_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $notulen->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Notulen</label>
            <textarea name="isi" class="form-control" rows="5">{{ $notulen->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label>File Notulen (opsional)</label>
            @if($notulen->file_path)
                <p>File saat ini: <a href="{{ asset('storage/'.$notulen->file_path) }}" target="_blank">Lihat File</a></p>
            @endif
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
