@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        .stat-card {
            border: none;
            /* hilangkan border default */
            border-left: 5px solid transparent;
            /* hanya di kiri */
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .border-start-primary {
            border-left-color: #4e73df;
            /* biru */
        }

        .border-start-success {
            border-left-color: #1cc88a;
            /* hijau */
        }

        .border-start-warning {
            border-left-color: #f6c23e;
            /* kuning */
        }

        .border-start-info {
            border-left-color: #36b9cc;
            /* biru muda */
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h3 class="mb-0">Admin Dashboard</h3>
                <p class="text-muted">Ringkasan informasi organisasi</p>
            </div>
        </div>

        {{-- ======= Statistik Cards ======= --}}
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-md-3">
                <div class="card stat-card border-start-primary shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-primary text-uppercase mb-2">Total Anggota</h6>
                            <h4 class="fw-bold mb-0">{{ $totalAnggota }}</h4>
                            <small class="text-success">+5 dari bulan lalu</small>
                        </div>
                        <i class="bi bi-people-fill fs-2 text-secondary opacity-25"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card stat-card border-start-success shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-success text-uppercase mb-2">Jumlah Rapat</h6>
                            <h4 class="fw-bold mb-0">{{ $totalRapat }}</h4>
                            <small class="text-primary">3 bulan ini</small>
                        </div>
                        <i class="bi bi-calendar-event-fill fs-2 text-secondary opacity-25"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card stat-card border-start-warning shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-warning text-uppercase mb-2">Program Kerja Aktif</h6>
                            <h4 class="fw-bold mb-0">{{ $totalProgramAktif }}</h4>
                            <small class="text-warning">Sedang berjalan</small>
                        </div>
                        <i class="bi bi-list-task fs-2 text-secondary opacity-25"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card stat-card border-start-info shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-info text-uppercase mb-2">Evaluasi</h6>
                            <h4 class="fw-bold mb-0">{{ $totalEvaluasi }}</h4>
                            <small class="text-muted">Selesai bulan ini</small>
                        </div>
                        <i class="bi bi-graph-up-arrow fs-2 text-secondary opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-3">
            <!-- Rapat Terbaru -->
            <div class="col-lg-6">
                <div class="card card-clean h-100">
                    <div class="card-body">
                        <div class="card-header-mini">
                            <h5 class="mb-0">Rapat Terbaru</h5>
                            <a href="{{ route('rapat.index') }}" class="small text-primary">Lihat Semua</a>
                        </div>

                        <ul class="list-unstyled mb-0">
                            @forelse($rapatTerbaru as $rapat)
                                <li class="item-row">
                                    <div class="item-icon" style="background:#e6f0ff; color:#3b82f6;">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>

                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div>
                                                <strong>{{ $rapat->judul }}</strong>
                                                <div class="item-date">
                                                    {{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('j F Y') }}
                                                </div>
                                            </div>
                                            <div class="ms-3">
                                                @if (\Carbon\Carbon::parse($rapat->tanggal)->isPast())
                                                    <span class="status-pill"
                                                        style="background:#ecfdf5; color:#16a34a;">Selesai</span>
                                                @else
                                                    <span class="status-pill"
                                                        style="background:#fff7ed; color:#d97706;">Mendatang</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="text-muted">Tidak ada rapat</li>
                            @endforelse
                        </ul>

                        <div class="mb-2">
                            @forelse($programTerbaru as $program)
                                @php
                                    $progress = $program->progress ?? rand(10, 90);
                                @endphp

                                <div class="mb-3">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="item-icon" style="background:#eef2ff; color:#4e73df;">
                                            <i class="bi bi-list-task"></i>
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong>{{ $program->nama }}</strong>
                                                    <div class="program-target">Target:
                                                        {{ \Carbon\Carbon::parse($program->target_date ?? now())->translatedFormat('j F Y') }}
                                                    </div>
                                                </div>
                                                <div class="small text-muted">{{ $progress }}%</div>
                                            </div>

                                            <div class="progress-thin mt-2">
                                                <div class="progress-bar @if ($progress >= 75) bg-success @elseif($progress >= 45) bg-primary @elseif($progress >= 25) bg-warning @else bg-danger @endif"
                                                    role="progressbar" style="width: {{ $progress }}%;"
                                                    aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div class="text-muted">Tidak ada program kerja</div>
                            @endforelse
                        </div>
                    @elseif($progress >= 25)
                        bg-warning
                    @else
                        bg-danger @endif"
                        role="progressbar" style="width: {{ $progress }}%;"
                        aria-valuenow="{{ $progress }}" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>
            </div>
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
