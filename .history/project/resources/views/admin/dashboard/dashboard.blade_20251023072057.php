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
                        </div>
                        <div><i class="bi bi-graph-up-arrow"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
