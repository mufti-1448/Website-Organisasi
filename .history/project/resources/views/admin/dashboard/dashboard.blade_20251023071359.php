@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* ===== STYLE CARD DASHBOARD SB ADMIN 2 ===== */
        .card-stats {
            border-left-width: 4px;
            border-left-style: solid;
            border-radius: 0.35rem;
            transition: all 0.2s ease-in-out;
        }

        .card-stats:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        /* Warna border kiri */
        .border-primary {
            border-left-color: #4e73df !important;
        }

        .border-success {
            border-left-color: #1cc88a !important;
        }

        .border-warning {
            border-left-color: #f6c23e !important;
        }

        .border-info {
            border-left-color: #36b9cc !important;
        }

        /* Teks dan layout */
        .card-stats .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-stats .text-xs {
            font-size: 0.75rem;
            font-weight: 700;
            color: #858796;
            text-transform: uppercase;
        }

        .card-stats .h5 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #5a5c69;
        }

        .card-stats i {
            font-size: 2rem;
            color: #dddfeb;
        }
    </style>

    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-0">Admin Dashboard</h3>
                <p class="text-muted">Ringkasan informasi organisasi</p>
            </div>
        </div>

        {{-- ======= Statistik Cards ======= --}}
        <div class="row g-3 mb-4">

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-stats border-primary">
                    <div class="card-body">
                        <div>
                            <div class="text-xs">TOTAL ANGGOTA</div>
                            <div class="h5 mb-0 fw-bold">{{ $totalAnggota }}</div>
                            <small class="text-success">+5 dari bulan lalu</small>
                        </div>
                        <div><i class="bi bi-people-fill"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-stats border-success">
                    <div class="card-body">
                        <div>
                            <div class="text-xs">JUMLAH RAPAT</div>
                            <div class="h5 mb-0 fw-bold">{{ $totalRapat }}</div>
                            <small class="text-primary">3 bulan ini</small>
                        </div>
                        <div><i class="bi bi-calendar-event-fill"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-stats border-warning">
                    <div class="card-body">
                        <div>
                            <div class="text-xs">PROGRAM KERJA AKTIF</div>
                            <div class="h5 mb-0 fw-bold">{{ $totalProgramAktif }}</div>
                            <small class="text-warning">Sedang berjalan</small>
                        </div>
                        <div><i class="bi bi-list-task"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-stats border-info">
                    <div class="card-body">
                        <div>
                            <div class="text-xs">EVALUASI</div>
                            <div class="h5 mb-0 fw-bold">{{ $totalEvaluasi }}</div>
                            <small class="text-muted">Selesai bulan ini</small>
                        </div>
                        <div><i class="bi bi-graph-up-arrow"></i></div>
                    </div>
                </div>
            </div>
        </div>

        Bagian Rapat & Program tetap sama
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Rapat Terbaru</h5>
                            <a href="#" class="small">Lihat Semua</a>
                        </div>

                        <ul class="list-unstyled">
                            @forelse($rapatTerbaru as $rapat)
                                <li class="d-flex align-items-start mb-3">
                                    <div class="me-3 p-2 bg-light rounded">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                    </div>
                                    <div>
                                        <strong>{{ $rapat->judul }}</strong>
                                        <div class="text-muted small">
                                            {{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('j F Y') }} ·
                                            {{ \Carbon\Carbon::parse($rapat->tanggal)->format('H:i') }} WIB
                                        </div>
                                        @if (\Carbon\Carbon::parse($rapat->tanggal)->isPast())
                                            <span class="badge bg-success mt-1">Selesai</span>
                                        @else
                                            <span class="badge bg-warning mt-1">Mendatang</span>
                                        @endif
                                    </div>
                                </li>
                            @empty
                                <li class="text-muted">Tidak ada rapat</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Program Kerja Terbaru</h5>
                            <a href="#" class="small">Lihat Semua</a>
                        </div>

                        @forelse($programTerbaru as $program)
                            @php
                                $progress = rand(10, 90);
                            @endphp
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $program->nama }}</strong>
                                        <div class="small text-muted">Target: -</div>
                                    </div>
                                    <div class="small text-muted">{{ $progress }}%</div>
                                </div>
                                <div class="progress mt-2" style="height:8px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @empty
                            <div class="text-muted">Tidak ada program kerja</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
