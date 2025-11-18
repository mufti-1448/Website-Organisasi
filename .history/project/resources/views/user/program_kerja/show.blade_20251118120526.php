@extends('user.layouts.app')

@section('title', 'Detail Program Kerja')

@section('content')

<style>
    /* HERO */
    .hero-section {
        background: linear-gradient(135deg, #4f8cff, #346dff);
        border-radius: 0;
    }

    /* MAIN CARD */
    .detail-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 2.2rem;
        border: 1px solid #e9ecef;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    }

    /* BADGE STYLE */
    .status-badge {
        font-size: 0.85rem;
        padding: 6px 14px;
        border-radius: 50px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-berjalan {
        background: #e7ffe9;
        color: #1f9d42;
    }

    .badge-direncanakan {
        background: #e8efff;
        color: #2b50ff;
    }

    .badge-selesai {
        background: #f1f1f1;
        color: #5f5f5f;
    }

    /* SECTION BOX */
    .info-section {
        background: #fafafa;
        border: 1px solid #ececec;
        border-radius: 14px;
        padding: 1.4rem 1.6rem;
        margin-bottom: 1.4rem;
    }

    .info-label {
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 6px;
        color: #343a40;
    }

    .info-value {
        color: #495057;
        font-size: 0.97rem;
        line-height: 1.55;
    }

    /* BACK BUTTON */
    .back-btn {
        background: #e9ecef;
        color: #495057;
        padding: 10px 18px;
        border-radius: 10px;
        font-weight: 500;
        border: 1px solid #dcdcdc;
        transition: 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .back-btn:hover {
        background: #d7dce0;
        color: #212529;
        text-decoration: none;
    }
</style>

<section class="hero-section text-white py-5">
    <div class="container text-center py-4">
        <h1 class="fw-bold mb-2">Detail Program Kerja</h1>
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
