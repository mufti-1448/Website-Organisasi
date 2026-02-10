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
        <h3 class="mb-3"><i class="bi bi-eye"></i> Detail Rapat</h3>

        <div class="detail-container">
            <form>
                <ul class="nav nav-tabs" id="rapatTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                            type="button">Detail Rapat</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="notulen-tab" data-bs-toggle="tab" data-bs-target="#notulen"
                            type="button">Notulen</button>
                    </li>

                </ul>

                <div class="tab-content mt-3">

                    {{-- Detail Rapat --}}
                    <div class="tab-pane fade show active" id="detail">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">ID Rapat</label>
                                <input type="text" class="form-control" value="{{ $rapat->id }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" value="{{ $rapat->judul }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="{{ $rapat->tanggal }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Waktu</label>
                                <input type="time" class="form-control" value="{{ $rapat->waktu }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tempat</label>
                                <input type="text" class="form-control" value="{{ $rapat->tempat }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" disabled>
                                    <option value="belum" {{ $rapat->status == 'belum' ? 'selected' : '' }}>Belum</option>
                                    <option value="berlangsung" {{ $rapat->status == 'berlangsung' ? 'selected' : '' }}>
                                        Berlangsung</option>
                                    <option value="selesai" {{ $rapat->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Notulen --}}
                    <div class="tab-pane fade" id="notulen">
                        @if ($rapat->notulen)
                            <div class="mb-3">
                                <label class="form-label">Isi Notulen</label>
                                <textarea class="form-control" rows="5" readonly>{{ $rapat->notulen->isi }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" value="{{ $rapat->notulen->tanggal }}"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Waktu</label>
                                    <input type="time" class="form-control" value="{{ $rapat->notulen->waktu }}"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Penulis</label>
                                    <input type="text" class="form-control"
                                        value="{{ $rapat->notulen->penulis->nama ?? '-' }}" readonly>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">Belum ada notulen untuk rapat ini.</p>
                        @endif
                    </div>


                </div>
            </form>
            <div class="gap-3">
                <a href="{{ route('admin.rapat.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <a href="{{ route('admin.rapat.edit', $rapat->id) }}" class="btn btn-warning mt-3"><i
                        class="bi bi-pencil"></i>
                    Edit
                </a>
            </div>

        </div>
    </div>
@endsection
