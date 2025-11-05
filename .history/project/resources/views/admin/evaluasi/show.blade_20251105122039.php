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
    </style>

    <div class="container mt-4">
        <h3 class="mb-3"><i class="bi bi-eye"></i> Detail Evaluasi</h3>

        <div class="detail-container">
            <form>
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

                    {{-- Detail Evaluasi --}}
                    <div class="tab-pane fade show active" id="detail">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">ID Evaluasi</label>
                                <input type="text" class="form-control" value="{{ $evaluasi->id }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" value="{{ $evaluasi->judul }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Program Kerja</label>
                                <input type="text" class="form-control"
                                    value="{{ $evaluasi->programKerja->nama ?? '-' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="{{ $evaluasi->tanggal }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control"
                                    value="{{ $evaluasi->penulisRelation->nama ?? $evaluasi->penulis }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Isi Evaluasi</label>
                                <textarea class="form-control" rows="5" readonly>{{ $evaluasi->isi }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- File --}}
                    <div class="tab-pane fade" id="file">
                        @if ($evaluasi->file)
                            <div class="mb-3">
                                <label class="form-label">File Evaluasi</label>
                                <br>
                                <a href="{{ asset('storage/' . $evaluasi->file) }}" target="_blank"
                                    class="btn btn-outline-primary">
                                    <i class="bi bi-download"></i> Lihat File
                                </a>
                            </div>
                        @else
                            <p class="text-muted">Belum ada file untuk evaluasi ini.</p>
                        @endif
                    </div>

                </div>
            </form>

            <div class="gap-3">
                <a href="{{ route('admin.evaluasi.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <a href="{{ route('admin.evaluasi.edit', $evaluasi->id) }}" class="btn btn-warning mt-3"><i
                        class="bi bi-pencil"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection
