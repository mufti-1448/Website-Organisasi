@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Evaluasi</h3>

        <form action="{{ route('evaluasi.update', $evaluasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                        <input type="text" name="id" class="form-control" value="{{ $evaluasi->id }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="program_id" class="form-label">Program Kerja</label>
                        <select name="program_id" class="form-select" required>
                            <option value="">-- Pilih Program Kerja --</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}"
                                    {{ $evaluasi->program_id == $program->id ? 'selected' : '' }}>
                                    {{ $program->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Evaluasi</label>
                        <input type="text" name="judul" class="form-control" value="{{ $evaluasi->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Evaluasi</label>
                        <textarea name="isi" class="form-control" rows="4" required>{{ $evaluasi->isi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Evaluasi</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $evaluasi->tanggal }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <select name="penulis" class="form-select" required>
                            <option value="">-- Pilih Penulis --</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" {{ $evaluasi->penulis == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama }} ({{ $a->jabatan }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- File -->
                <div class="tab-pane fade" id="file">
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File Baru (Opsional)</label>
                        @if ($evaluasi->file)
                            <p>File saat ini: <a href="{{ asset('storage/' . $evaluasi->file) }}" target="_blank">Lihat
                                    File</a></p>
                        @endif
                        <input type="file" name="file" id="file" class="form-control"
                            accept=".pdf,.doc,.docx,.jpg,.png">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Update</button>
            <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection
