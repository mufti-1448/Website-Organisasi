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
                            <h4 class="fw-bold mb-0">{{ $totalProgram }}</h4>
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
