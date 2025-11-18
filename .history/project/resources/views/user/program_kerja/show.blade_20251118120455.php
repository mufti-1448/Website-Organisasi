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
                                <h2 class="fw-bold mb-2">{{ $program->nama }}</h2>
                                @php
                                    $statusClass = match ($program->status) {
                                        'berlangsung' => 'badge-berjalan',
                                        'belum' => 'badge-direncanakan',
                                        'selesai' => 'badge-selesai',
                                        default => 'badge-secondary',
                                    };

                                    $statusText = match ($program->status) {
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
                            <p class="info-value">{{ $program->deskripsi }}</p>
                        </div>

                        <!-- Penanggung Jawab -->
                        <div class="info-section">
                            <h5 class="info-label">Penanggung Jawab</h5>
                            <p class="info-value">
                                <i class="bi bi-person-fill me-2"></i>
                                {{ $program->penanggungJawab->nama ?? 'Tidak ada' }}
                            </p>
                        </div>

                        <!-- Tanggal Mulai -->
                        @if ($program->tanggal_mulai)
                            <div class="info-section">
                                <h5 class="info-label">Tanggal Mulai</h5>
                                <p class="info-value">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    {{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d F Y') }}
                                </p>
                            </div>
                        @endif

                        <!-- Tanggal Selesai -->
                        @if ($program->tanggal_selesai)
                            <div class="info-section">
                                <h5 class="info-label">Tanggal Selesai</h5>
                                <p class="info-value">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    {{ \Carbon\Carbon::parse($program->tanggal_selesai)->format('d F Y') }}
                                </p>
                            </div>
                        @endif

                        <!-- Anggaran -->
                        @if ($program->anggaran)
                            <div class="info-section">
                                <h5 class="info-label">Anggaran</h5>
                                <p class="info-value">
                                    <i class="bi bi-cash me-2"></i>
                                    Rp {{ number_format($program->anggaran, 0, ',', '.') }}
                                </p>
                            </div>
                        @endif

                        <!-- Lokasi -->
                        @if ($program->lokasi)
                            <div class="info-section">
                                <h5 class="info-label">Lokasi</h5>
                                <p class="info-value">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {{ $program->lokasi }}
                                </p>
                            </div>
                        @endif

                        <!-- Target Peserta -->
                        @if ($program->target_peserta)
                            <div class="info-section">
                                <h5 class="info-label">Target Peserta</h5>
                                <p class="info-value">
                                    <i class="bi bi-people me-2"></i>
                                    {{ $program->target_peserta }} orang
                                </p>
                            </div>
                        @endif

                        <!-- Kriteria Peserta -->
                        @if ($program->kriteria_peserta)
                            <div class="info-section">
                                <h5 class="info-label">Kriteria Peserta</h5>
                                <p class="info-value">{{ $program->kriteria_peserta }}</p>
                            </div>
                        @endif

                        <!-- Indikator Keberhasilan -->
                        @if ($program->indikator_keberhasilan)
                            <div class="info-section">
                                <h5 class="info-label">Indikator Keberhasilan</h5>
                                <p class="info-value">{{ $program->indikator_keberhasilan }}</p>
                            </div>
                        @endif

                        <!-- Sasaran -->
                        @if ($program->sasaran)
                            <div class="info-section">
                                <h5 class="info-label">Sasaran</h5>
                                <p class="info-value">{{ $program->sasaran }}</p>
                            </div>
                        @endif

                        <!-- Tujuan -->
                        @if ($program->tujuan)
                            <div class="info-section">
                                <h5 class="info-label">Tujuan</h5>
                                <p class="info-value">{{ $program->tujuan }}</p>
                            </div>
                        @endif

                        <!-- Manfaat -->
                        @if ($program->manfaat)
                            <div class="info-section">
                                <h5 class="info-label">Manfaat</h5>
                                <p class="info-value">{{ $program->manfaat }}</p>
                            </div>
                        @endif

                        <!-- Created At -->
                        <div class="info-section">
                            <h5 class="info-label">Dibuat Pada</h5>
                            <p class="info-value">
                                <i class="bi bi-clock me-2"></i>
                                {{ $program->created_at->format('d F Y, H:i') }}
                            </p>
                        </div>

                        <!-- Updated At -->
                        @if ($program->updated_at != $program->created_at)
                            <div class="info-section">
                                <h5 class="info-label">Terakhir Diupdate</h5>
                                <p class="info-value">
                                    <i class="bi bi-pencil me-2"></i>
                                    {{ $program->updated_at->format('d F Y, H:i') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
