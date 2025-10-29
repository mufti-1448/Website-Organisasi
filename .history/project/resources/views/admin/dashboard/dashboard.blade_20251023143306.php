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
        }

        .stat-card .card-body {
            min-height: 100px;
            /* kamu bisa sesuaikan, misal 130px atau 150px */
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

        /* Card base to match sample */
        .card-clean {
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 6px 18px rgba(6, 24, 48, 0.03);
        }

        /* Header kecil "Lihat Semua" */
        .card-header-mini {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 0.75rem;
        }

        /* Item in list - left icon and content */
        .item-row {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            padding: 0.75rem 0;
        }

        /* Circular icon background (soft) */
        .item-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #fff;
        }

        /* light icon color / soft */
        .icon-soft {
            color: rgba(13, 20, 30, 0.25);
        }

        /* small muted date text */
        .item-date {
            color: #6b7280;
            /* gray-500 */
            font-size: 0.875rem;
        }

        /* status pill */
        .status-pill {
            display: inline-block;
            padding: 0.15rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 999px;
            font-weight: 600;
        }

        /* spacing between items */
        .list-unstyled .item-row+.item-row {
            border-top: 1px solid rgba(15, 23, 42, 0.03);
        }

        /* Progress bar thin and rounded */
        .progress-thin {
            height: 8px;
            border-radius: 999px;
            background-color: rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .progress-thin .progress-bar {
            border-radius: 999px;
        }

        /* text smaller for the program note */
        .program-target {
            font-size: 0.85rem;
            color: #6b7280;
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
                        </div>
                        <i class="bi bi-calendar-event-fill fs-2 text-secondary opacity-25"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card stat-card border-start-warning shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-warning text-uppercase mb-2">Program Kerja</h6>
                            <h4 class="fw-bold mb-0">{{ $totalProgram }}</h4>
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
                            <h5 class="mb-0">Rapat Mendatang</h5>
                            <a href="#" class="small text-primary">Lihat Semua</a>
                        </div>

                        <ul class="list-unstyled mb-0">
                            @forelse($rapatTerbaru as $rapat)
                                <li class="item-row">
                                    <!-- ikon kiri -->
                                    <div class="item-icon" style="background:#e6f0ff; color:#3b82f6;">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>

                                    <!-- konten -->
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div>
                                                <strong>{{ $rapat->judul }}</strong>
                                                <div class="item-date">
                                                    {{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('j F Y') }}
                                                    • {{ \Carbon\Carbon::parse($rapat->tanggal)->format('H:i') }} WIB
                                                </div>
                                            </div>
                                            <!-- badge status -->
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

                    </div>
                </div>
            </div>

            <!-- Program Kerja Terbaru -->
            <div class="col-lg-6">
                <div class="card card-clean h-100">
                    <div class="card-body">
                        <div class="card-header-mini">
                            <h5 class="mb-0">Program Kerja Mendatang</h5>
                            <a href="route('program.index')" class="small text-primary">Lihat Semua</a>
                        </div>

                        <div class="mb-2">
                            @forelse($programTerbaru as $program)
                                @php
                                    // Jika ada nilai progress sebenarnya, gunakan itu. Contoh placeholder:
                                    $progress = $program->progress ?? rand(10, 90);
                                    // warna progress bisa ditentukan berdasarkan kategori:
                                    $color = $program->color ?? 'primary'; // primary, success, warning, info, etc.
                                @endphp

                                <div class="mb-3">
                                    <div class="d-flex align-items-start g-3">
                                        <div class="item-icon" style="background:#eefdf6; color:#10b981;">
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
                                                <div class="progress-bar
                                                    @if ($progress >= 75) bg-success
                                                    @elseif($progress >= 45) bg-primary
                                                    @elseif($progress >= 25) bg-warning
                                                    @else bg-danger @endif"
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

                    </div>
                </div>
            </div>
        </div>

    @endsection
