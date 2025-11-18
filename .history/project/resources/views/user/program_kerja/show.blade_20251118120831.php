@extends('user.layouts.app')

@section('title', 'Detail Program Kerja - ' . $program->nama)

@section('content')

<style>
    .program-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .program-header {
        background: #0d6efd;
        padding: 32px 20px;
        text-align: center;
        color: #fff;
    }

    .program-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .badge-status {
        background: #ffffff;
        color: #0d6efd;
        padding: 6px 14px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
        font-size: .85rem;
    }

    .badge-berjalan { background: #d1e7ff; color:#0b66c3; }
    .badge-selesai { background: #d4f8e8; color:#198754; }
    .badge-direncanakan { background:#fff3cd; color:#b18600; }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: .75rem;
    }

    .info-item {
        padding: 14px 0;
        border-bottom: 1px solid #eceff4;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #eaf2ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 14px;
        font-size: 1.2rem;
    }

    .program-desc {
        white-space: pre-line;
        line-height: 1.6;
        color: #444;
    }

    @media(max-width: 768px) {
        .program-title {
            font-size: 1.45rem;
        }
    }
</style>

<section class="hero-section text-dark py-4">
    <div class="container text-center py-3">
        <h1 class="fw-bold mb-2">Detail Program Kerja</h1>
        <p class="lead">Informasi lengkap mengenai program kerja</p>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="program-card">

                    {{-- HEADER --}}
                    <div class="program-header">
                        <h2 class="program-title">{{ $program->nama }}</h2>

                        @php
                            $statusClass = match ($program->status) {
                                'berlangsung' => 'badge-berjalan',
                                'selesai' => 'badge-selesai',
                                'belum' => 'badge-direncanakan',
                                default => 'badge-secondary'
                            };

                            $statusText = match ($program->status) {
                                'berlangsung' => 'Berjalan',
                                'selesai' => 'Selesai',
                                'belum' => 'Direncanakan',
                                default => 'Tidak diketahui'
                            };
                        @endphp

                        <span class="badge-status {{ $statusClass }}">{{ $statusText }}</span>
                    </div>

                    {{-- BODY --}}
                    <div class="p-4">

                        <h5 class="section-title">Deskripsi</h5>
                        <p class="program-desc">
                            {!! nl2br(e($program->deskripsi)) !!}
                        </p>

                        <div class="info-item d-flex mt-4">
                            <div class="info-icon"><i class="bi bi-person-fill"></i></div>
                            <div>
                                <div class="detail-title">Penanggung Jawab</div>
                                <span class="text-muted">
                                    {{ $program->penanggungJawab->nama ?? 'Tidak ada' }}
                                </span>
                            </div>
                        </div>

                        <div class="info-item d-flex">
                            <div class="info-icon"><i class="bi bi-calendar-event-fill"></i></div>
                            <div>
                                <div class="detail-title">Tanggal</div>
                                <span class="text-muted">
                                    {{ $program->tanggal ? \Carbon\Carbon::parse($program->tanggal)->translatedFormat('d F Y') : 'Tidak ditentukan' }}
                                </span>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('user.program_kerja.index') }}" class="btn btn-primary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Kembali
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
