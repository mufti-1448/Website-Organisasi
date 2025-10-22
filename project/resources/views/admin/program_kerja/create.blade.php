@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-plus-circle"></i> Tambah Program Kerja</h3>

        <form action="{{ route('program_kerja.store') }}" method="POST">
            @csrf
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
                <li class="nav-item">
                    <button class="nav-link" id="dokumentasi-tab" data-bs-toggle="tab" data-bs-target="#dokumentasi"
                        type="button">Dokumentasi</button>
                </li>
            </ul>

            <div class="tab-content mt-3">

                <!-- Detail -->
                <div class="tab-pane fade show active" id="detail">
                    <div class="mb-3">
                        <label class="form-label">ID Program</label>
                        <input type="text" class="form-control" value="{{ $nextCode }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Program</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penanggung Jawab</label>
                        <select name="penanggung_jawab_id" class="form-select" required>
                            <option value="">-- Pilih Penanggung Jawab --</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="belum">Belum</option>
                            <option value="berlangsung">Berlangsung</option>
                            <option value="selesai">Selesai</option>
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
                                <option value="{{ $not->id }}">{{ $not->judul ?? 'Tanpa Judul' }} -
                                    {{ \Carbon\Carbon::parse($not->tanggal)->format('d-m-Y') }}</option>
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
                                <option value="{{ $eval->id }}">{{ $eval->judul ?? 'Evaluasi' }} -
                                    {{ \Carbon\Carbon::parse($eval->tanggal)->format('d-m-Y') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Dokumentasi -->
                <div class="tab-pane fade" id="dokumentasi">
                    <div class="mb-3">
                        <label class="form-label">Pilih Dokumentasi</label>
                        <select name="dokumentasi_id" class="form-select">
                            <option value="">-- Pilih Dokumentasi --</option>
                            @foreach ($dokumentasiList as $dok)
                                <option value="{{ $dok->id }}">{{ $dok->judul ?? 'Dokumentasi' }} -
                                    {{ \Carbon\Carbon::parse($dok->tanggal)->format('d-m-Y') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection
