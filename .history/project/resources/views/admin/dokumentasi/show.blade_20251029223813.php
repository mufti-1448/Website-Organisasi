@extends('admin.layouts.app')

@section('title', 'Detail Dokumentasi')

@section('content')
    <style>
        /* Title & Page Section */
        .page-title {
            font-size: 24px;
            font-weight: 700;
        }

        /* Card Styling */
        .card-custom {
            border: none;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        /* Image Styling */
        .doc-image {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        /* Info Section */
        .info-section {
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .info-value {
            color: #6c757d;
            line-height: 1.5;
        }

        /* Button Styling */
        .btn-custom {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-custom:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="page-title mb-1">Detail Dokumentasi</h4>
                <small class="text-muted">Informasi lengkap dokumentasi</small>
            </div>
            <div>
                <a href="{{ route('dokumentasi.edit', $dokumentasi->id) }}" class="btn btn-warning btn-custom me-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary btn-custom">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="info-section">
                            <div class="info-label">Judul Dokumentasi</div>
                            <div class="info-value fs-5 fw-semibold">{{ $dokumentasi->judul }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-section">
                                    <div class="info-label">Tanggal</div>
                                    <div class="info-value">
                                        {{ \Carbon\Carbon::parse($dokumentasi->tanggal)->format('d F Y') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-section">
                                    <div class="info-label">Kategori</div>
                                    <div class="info-value">{{ $dokumentasi->kategori ?? 'Tidak ada kategori' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <div class="info-label">Deskripsi</div>
                            <div class="info-value">{{ $dokumentasi->deskripsi ?? 'Tidak ada deskripsi' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-custom">
                    <div class="card-body text-center">
                        @if ($dokumentasi->foto)
                            <img src="{{ asset('storage/' . $dokumentasi->foto) }}" class="doc-image mb-3"
                                alt="Foto Dokumentasi">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3"
                                style="height: 200px;">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                            <p class="text-muted">Tidak ada foto dokumentasi</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>j
@endsection
