@extends('user.layouts.app')

@section('title', 'Detail Program Kerja')

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

        .info-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: #212529;
            line-height: 1.6;
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
    </style>

    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-3">Detail Program Kerja</h1>
            <p class="lead">Informasi lengkap tentang program kerja yang dipilih</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="detail-card">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h2 class="fw-bold mb-2">{{ $programKerja->nama }}</h2>
                                @php
                                    $statusClass = match ($programKerja->status) {
                                        'berlangsung' => 'badge-berjalan',
                                        'belum' => 'badge-direncanakan',
                                        'selesai' => 'badge-selesai',
                                        default => 'badge-secondary',
                                    };

                                    $statusText = match ($programKerja->status) {
                                        'berlangsung' => 'Berjalan',
                                        'belum' => 'Direncanakan',
                                        'selesai' => 'Selesai',
                                        default => 'Unknown',
                                    };
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                            </div>
                            <a href="{{ route('user.program_kerja.index') }}" class="back-btn">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>
                        </div>

                        <!-- Deskripsi -->
                        <div class="info-section">
                            <h5 class="info-label">Deskripsi Program</h5>
                            <p class="info-value">{{ $programKerja->deskripsi }}</p>
                        </div>
