@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Program Kerja</h3>

        <form action="{{ route('admin.program_kerja.update', $program->id) }}" method="POST">
            @csrf
            @method('PUT')

            <ul class="nav nav-tabs" id="programTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                        type="button">Detail Program</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="notulen-tab" data-bs-toggle="tab" data-bs-target="#notulen"
                        type="button">Notulen</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" id="evaluasi-tab" data-bs-toggle="tab" data-bs-target="#evaluasi"
                        type="button">Evaluasi</button>
                </li>

            </ul>

            <div class="tab-content mt-3">
                <!-- Detail Program -->
                <div class="tab-pane fade show active" id="detail">
                    <div class="mb-3">
                        <label class="form-label">ID Program</label>
                        <input type="text" class="form-control" value="{{ $program->id }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Program</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $program->nama) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $program->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penanggung Jawab</label>
                        <select name="penanggung_jawab_id" class="form-select" required>
                            <option value="">-- Pilih Penanggung Jawab --</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}"
                                    {{ $program->penanggung_jawab_id == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Target Date</label>
                        <input type="date" name="target_date" class="form-control"
                            value="{{ old('target_date', $program->target_date) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="belum" {{ $program->status == 'belum' ? 'selected' : '' }}>Belum</option>
                            <option value="berlangsung" {{ $program->status == 'berlangsung' ? 'selected' : '' }}>
                                Berlangsung</option>
                            <option value="selesai" {{ $program->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                </div>

                <!-- Notulen -->
                <div class="tab-pane fade" id="notulen">
                    <div class="mb-3">
                        <label class="form-label">Pilih Notulen</label>
                        <select name="notulen_id" class="form-select">
                            <option value="">-- Pilih Notulen --</option>
                            @foreach ($notulenList as $not)
                                <option value="{{ $not->id }}"
                                    {{ optional($program->notulen)->id == $not->id ? 'selected' : '' }}>
                                    {{ $not->judul ?? 'Tanpa Judul' }}
                                    ({{ \Carbon\Carbon::parse($not->tanggal)->format('d-m-Y') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Evaluasi -->
                <div class="tab-pane fade" id="evaluasi">
                    <div class="mb-3">
                        <label class="form-label">Pilih Evaluasi</label>
                        <select name="evaluasi_id" class="form-select">
                            <option value="">-- Pilih Evaluasi --</option>
                            @foreach ($evaluasiList as $eval)
                                <option value="{{ $eval->id }}"
                                    {{ optional($program->evaluasi)->id == $eval->id ? 'selected' : '' }}>
                                    {{ $eval->judul ?? 'Evaluasi' }}
                                    ({{ \Carbon\Carbon::parse($eval->tanggal)->format('d-m-Y') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Update</button>
            <a href="{{ route('admin.program_kerja.index') }}" class="btn btn-secondary mt-3"><i
                    class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection
