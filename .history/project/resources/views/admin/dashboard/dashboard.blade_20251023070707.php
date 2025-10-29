@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* Gaya border kiri untuk setiap card */
        .card-border-primary {
            border-left: 6px solid #0d6efd; /* Biru Bootstrap */
        }
        .card-border-success {
            border-left: 6px solid #198754; /* Hijau Bootstrap */
        }
        .card-border-warning {
            border-left: 6px solid #ffc107; /* Kuning Bootstrap */
        }
        .card-border-info {
            border-left: 6px solid #0dcaf0; /* Biru muda Bootstrap */
        }
    </style>

    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-0">Admin Dashboard</h3>
                <p class="text-muted">Ringkasan informasi organisasi</p>
            </div>
        </div>

        {{-- Statistik Card --}}
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-border-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Total Anggota</h5>
                                <h2 class="fw-bold">{{ $totalAnggota }}</h2>
                                <small class="text-success">+5 dari bulan lalu</small>
                            </div>
                            <div class="bg-primary text-white rounded p-2">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-border-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Jumlah Rapat</h5>
                                <h2 class="fw-bold">{{ $totalRapat }}</h2>
                                <small class="text-primary">3 bulan ini</small>
                            </div>
                            <div class="bg-success text-white rounded p-2">
                                <i class="bi bi-calendar-event-fill fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-border-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Program Kerja Aktif</h5>
                                <h2 class="fw-bold">{{ $totalProgramAktif }}</h2>
                                <small class="text-warning">Sedang berjalan</small>
                            </div>
                            <div class="bg-warning text-white rounded p-2">
                                <i class="bi bi-list-task fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100 card-border-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Evaluasi</h5>
                                <h2 class="fw-bold">{{ $totalEvaluasi }}</h2>
                                <small class="text-muted">Selesai bulan ini</small>
                            </div>
                            <div class="bg-info text-white rounded p-2">
                                <i class="bi bi-graph-up-arrow fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection
