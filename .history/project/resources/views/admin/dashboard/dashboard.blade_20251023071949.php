@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* ===== STYLE CARD DASHBOARD SB ADMIN 2 ===== */
        .card-stats {
            border-left-width: 4px;
            border-left-style: solid;
            border-radius: 0.35rem;
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
@endsection
