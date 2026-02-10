@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* ===== STYLE CARD DASHBOARD SB ADMIN 2 ===== */
        .card-stats {
            border-left-width: 4px;
            border-left-style: solid;
            border-radius: 0.35rem;;
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
    </div>
@endsection
