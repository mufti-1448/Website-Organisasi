@extends('admin.layouts.app')

@section('content')
    <style>
        /* ===== Styling Basic ===== */
        .detail-container {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }

        /* Tabs style */
        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 500;
            padding: 10px 20px;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            background-color: #eef5ff;
            border-radius: 8px;
            font-weight: 600;
        }

        .nav-tabs {
            margin-bottom: 15px;
            border-bottom: 2px solid #dee2e6;
        }

        .tab-pane {
            animation: fadeEffect 0.3s ease-in-out;
        }

        @keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Form style */
        .form-control,
        .form-select {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.25);
        }

        label.form-label {
            font-weight: 600;
        }

        /* Return button */
        .btn-secondary {
            border-radius: 8px;
        }

        /* Image styling */
        .img-thumbnail {
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="container mt-4">
        <h3 class="mb-3"><i class="bi bi-eye"></i> Detail Program Kerja</h3>

        <div class="detail-container">
            <form>
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
                        <button class="nav-link" id="dokumentasi-tab" data-bs-toggle="tab" data-bs-target="#dokumentasi"
                            type="button">Dokumentasi</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="evaluasi-tab" data-bs-toggle="tab" data-bs-target="#evaluasi"
                            type="button">Evaluasi</button>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    {{-- Detail Program --}}
                    <div class="tab-pane fade show active" id="detail">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">ID Program</label>
                                <input type="text" class="form-control" value="{{ $program->id }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Program</label>
                                <input type="text" class="form-control" value="{{ $program->nama }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Penanggung Jawab</label>
                                <input type="text" class="form-control"
                                    value="{{ $program->penanggungJawab->nama ?? '-' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Target Date</label>
                                <input type="date" class="form-control" value="{{ $program->target_date }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" disabled>
                                    <option value="belum" {{ $program->status == 'belum' ? 'selected' : '' }}>Belum
                                    </option>
                                    <option value="berlangsung" {{ $program->status == 'berlangsung' ? 'selected' : '' }}>
                                        Berlangsung</option>
                                    <option value="selesai" {{ $program->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="5" readonly>{{ $program->deskripsi ?? '-' }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Notulen --}}
                    <div class="tab-pane fade" id="notulen">
                        @forelse ($program->notulen as $n)
                            <div class="mb-3">
                                <label class="form-label">Isi Notulen</label>
                                <textarea class="form-control" rows="5" readonly>{{ $n->isi }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" value="{{ $n->tanggal }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Waktu</label>
                                    <input type="time" class="form-control" value="{{ $n->waktu }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Penulis</label>
                                    <input type="text" class="form-control" value="{{ $n->penulis->nama ?? '-' }}"
                                        readonly>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada notulen untuk program kerja ini.</p>
                        @endforelse
                    </div>

                    {{-- Dokumentasi --}}
                    <div class="tab-pane fade" id="dokumentasi">
                        @forelse ($program->dokumentasi as $d)
                            <div class="mb-3">
                                <label class="form-label">Judul Dokumentasi</label>
                                <input type="text" class="form-control" value="{{ $d->judul }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="3" readonly>{{ $d->deskripsi ?? '-' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="{{ $d->tanggal }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" value="{{ $d->kategori ?? '-' }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                @if ($d->foto)
                                    <br>
                                    <img src="{{ asset('storage/' . $d->foto) }}" class="img-thumbnail"
                                        style="max-width: 230px;">
                                @else
                                    <input type="text" class="form-control" value="Tidak ada foto" readonly>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted">Belum ada dokumentasi untuk program kerja ini.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Evaluasi --}}
                <div class="tab-pane fade" id="evaluasi">
                    @forelse ($program->evaluasi as $e)
                        <div class="mb-3">
                            <label class="form-label">Judul Evaluasi</label>
                            <input type="text" class="form-control" value="{{ $e->judul }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Evaluasi</label>
                            <textarea class="form-control" rows="5" readonly>{{ $e->isi }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="{{ $e->tanggal }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" value="{{ $e->penulis->nama ?? '-' }}"
                                    readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">File</label>
                                @if ($e->file)
                                    <br>
                                    <a href="{{ asset('storage/' . $e->file) }}" target="_blank"
                                        class="btn btn-outline-primary">
                                        <i class="bi bi-download"></i> Lihat File
                                    </a>
                                @else
                                    <input type="text" class="form-control" value="Tidak ada file" readonly>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada evaluasi untuk program kerja ini.</p>
                    @endforelse
                </div>
            </form>

            <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </div>
    </div>
@endsection
