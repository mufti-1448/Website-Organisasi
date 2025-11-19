@extends('user.layouts.app')

@section('title', 'Detail Rapat')

@section('content')

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border-radius: 0;
        }

        .detail-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .status-badge {
            font-size: 0.875rem;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .badge-berjalan {
            background: #d1f7d6;
            color: #0f8f2f;
        }

        .badge-direncanakan {
            background: #dce8ff;
            color: #0d42ff;
        }

        .badge-selesai {
            background: #e8e8e8;
            color: #555;
        }

        .back-btn {
            background: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background: #5a6268;
            color: white;
            text-decoration: none;
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
    </style>

    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-3">Detail Rapat</h1>
            <p class="lead">Informasi Lengkap Tentang Rapat yang Anda Pilih</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="detail-card">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" id="rapatTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="detail-tab" data-bs-toggle="tab"
                                    data-bs-target="#detail" type="button">Detail Rapat</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="notulen-tab" data-bs-toggle="tab" data-bs-target="#notulen"
                                    type="button">Notulen</button>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            {{-- Detail rapat --}}
                            <div class="tab-pane fade show active" id="detail">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Rapat</label>
                                        <input type="text" class="form-control" value="{{ $rapat->judul }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Target Date</label>
                                        <input type="date" class="form-control" value="{{ $rapat->tanggal }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Waktu</label>
                                        <input type="time" class="form-control" value="{{ $rapat->waktu }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tempat</label>
                                        <input type="text" class="form-control" value="{{ $rapat->tempat }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" disabled>
                                            <option value="belum" {{ $rapat->status == 'belum' ? 'selected' : '' }}>Belum
                                            </option>
                                            <option value="berlangsung"
                                                {{ $rapat->status == 'berlangsung' ? 'selected' : '' }}>
                                                Berlangsung</option>
                                            <option value="selesai" {{ $rapat->status == 'selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Notulen --}}
                            <div class="tab-pane fade" id="notulen">
                                @if ($rapat->notulen)
                                    <div class="mb-3">
                                        <label class="form-label">Judul Notulen</label>
                                        <input type="text" class="form-control" value="{{ $rapat->notulen->judul }}"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Isi Notulen</label>
                                        <textarea class="form-control" rows="5" readonly>{{ $rapat->notulen->isi }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control"
                                                value="{{ $rapat->notulen->tanggal }}" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Waktu</label>
                                            <input type="time" class="form-control" value="{{ $rapat->notulen->waktu }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Penulis</label>
                                            <input type="text" class="form-control"
                                                value="{{ $rapat->notulen->penulisRelation->nama ?? '-' }}" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">File</label>
                                            @if ($rapat->notulen->file_path)
                                                <br>
                                                <a href="{{ asset('storage/' . $rapat->notulen->file_path) }}"
                                                    target="_blank" class="btn btn-outline-primary">
                                                    <i class="bi bi-download"></i> Lihat File
                                                </a>
                                            @else
                                                <input type="text" class="form-control" value="Tidak ada file" readonly>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted">Belum ada notulen untuk rapat kerja ini.</p>
                                @endif
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('user.rapat.index') }}" class="back-btn">
                                    <i class="bi bi-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
