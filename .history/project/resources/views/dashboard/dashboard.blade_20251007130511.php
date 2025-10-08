@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-0">Admin Dashboard</h3>
                <p class="text-muted">Ringkasan informasi organisasi</p>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Total Anggota</h5>
                                <h2 class="fw-bold">45</h2>
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
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Jumlah Rapat</h5>
                                <h2 class="fw-bold">12</h2>
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
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Program Kerja Aktif</h5>
                                <h2 class="fw-bold">8</h2>
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
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Evaluasi</h5>
                                <h2 class="fw-bold">15</h2>
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

        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Rapat Terbaru</h5>
                            <a href="#" class="small">Lihat Semua</a>
                        </div>

                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-3">
                                <div class="me-3 p-2 bg-light rounded">
                                    <i class="bi bi-calendar-check text-success"></i>
                                </div>
                                <div>
                                    <strong>Rapat Evaluasi Bulanan</strong>
                                    <div class="text-muted small">15 Januari 2024 • 14:00 WIB</div>
                                    <span class="badge bg-success mt-1">Selesai</span>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <div class="me-3 p-2 bg-light rounded">
                                    <i class="bi bi-calendar-event text-warning"></i>
                                </div>
                                <div>
                                    <strong>Rapat Koordinasi Program</strong>
                                    <div class="text-muted small">20 Januari 2024 • 10:00 WIB</div>
                                    <span class="badge bg-warning mt-1">Mendatang</span>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <div class="me-3 p-2 bg-light rounded">
                                    <i class="bi bi-calendar-week text-info"></i>
                                </div>
                                <div>
                                    <strong>Rapat Mingguan</strong>
                                    <div class="text-muted small">8 Januari 2024 • 16:00 WIB</div>
                                    <span class="badge bg-success mt-1">Selesai</span>
                                </div>
                            </li>
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

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Pelatihan Kepemimpinan</strong>
                                    <div class="small text-muted">Target: 25 Januari 2024</div>
                                </div>
                                <div class="small text-muted">75%</div>
                            </div>
                            <div class="progress mt-2" style="height:8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%;"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Bakti Sosial</strong>
                                    <div class="small text-muted">Target: 30 Januari 2024</div>
                                </div>
                                <div class="small text-muted">45%</div>
                            </div>
                            <div class="progress mt-2" style="height:8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 45%;"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Workshop Teknologi</strong>
                                    <div class="small text-muted">Target: 5 Februari 2024</div>
                                </div>
                                <div class="small text-muted">20%</div>
                            </div>
                            <div class="progress mt-2" style="height:8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
