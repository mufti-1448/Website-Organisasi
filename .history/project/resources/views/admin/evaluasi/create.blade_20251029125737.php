@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-plus-circle"></i> Tambah Evaluasi</h3>
        <form action="{{ route('evaluasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="evaluasiTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                        type="button">Detail Evaluasi</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file"
                        type="button">File</button>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <!-- Detail Evaluasi -->
                <div class="tab-pane fade show active" id="detail">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Evaluasi</label>
                        <input type="text" name="id" class="form-control" value="{{ $nextId ?? 'EVAL001' }}"
                            readonly>
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
                                <option value="{{ $a->id }}">{{ $a->nama }} ({{ $a->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- File -->
                <div class="tab-pane fade" id="file">
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File (Opsional)</label>
                        <input type="file" name="file" id="file" class="form-control"
                            accept=".pdf,.doc,.docx,.jpg,.png">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection
