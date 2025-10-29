@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-journal-text"></i> Tambah Notulen</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('notulen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="notulenTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                        type="button">Detail Notulen</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file"
                        type="button">File</button>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <!-- Detail Notulen -->
                <div class="tab-pane fade show active" id="detail">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Notulen</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $nextId }}"
                            readonly>
                        <small class="form-text text-muted">ID akan dibuat otomatis</small>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Notulen</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Notulen</label>
                        <textarea name="isi" id="isi" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Notulen</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu Notulen</label>
                        <input type="time" name="waktu" id="waktu" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis_id" class="form-label">Penulis</label>
                        <select name="penulis_id" id="penulis_id" class="form-select" required>
                            <option value="">-- Pilih Penulis --</option>
                            @foreach ($penulis as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rapat_id" class="form-label">Pilih Rapat</label>
                        <select name="rapat_id" id="rapat_id" class="form-select" required>
                            <option value="">-- Pilih Rapat --</option>
                            @foreach ($rapats as $rapat)
                                <option value="{{ $rapat->id }}">{{ $rapat->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- File -->
                <div class="tab-pane fade" id="file">
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File (Opsional)</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".pdf,.docx,.txt">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('notulen.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        </form>
    </div>
@endsection
