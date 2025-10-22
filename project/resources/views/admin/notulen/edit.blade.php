@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Notulen</h3>

        <form action="{{ route('notulen.update', $notulen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id" class="form-label">ID Notulen</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $notulen->id }}" readonly>
                <small class="form-text text-muted">ID tidak dapat diubah</small>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Notulen</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $notulen->judul }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi Notulen</label>
                <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ $notulen->isi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Notulen</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $notulen->tanggal }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="penulis_id" class="form-label">Penulis</label>
                <select name="penulis_id" id="penulis_id" class="form-select" required>
                    <option value="">-- Pilih Penulis --</option>
                    @foreach ($anggota as $a)
                        <option value="{{ $a->id }}" {{ $notulen->penulis_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="rapat_id" class="form-label">Pilih Rapat</label>
                <select name="rapat_id" id="rapat_id" class="form-select" required>
                    <option value="">-- Pilih Rapat --</option>
                    @foreach ($rapat as $r)
                        <option value="{{ $r->id }}" {{ $notulen->rapat_id == $r->id ? 'selected' : '' }}>
                            {{ $r->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload File Baru (Opsional)</label>
                @if ($notulen->file_path)
                    <p>File saat ini: <a href="{{ asset('storage/' . $notulen->file_path) }}" target="_blank">Lihat File</a>
                    </p>
                @endif
                <input type="file" name="file" id="file" class="form-control" accept=".pdf,.docx,.txt">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
