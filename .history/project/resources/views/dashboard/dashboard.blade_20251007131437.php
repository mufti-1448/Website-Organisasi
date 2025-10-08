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
                <div class="card shadow-sm h-100">
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
                <div class="card shadow-sm h-100">
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
                <div class="card shadow-sm h-100">
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
                                            {{ \Carbon\Carbon::parse($rapat->tanggal)->format('H:i') }} WIB</div>
                                        {{-- Simple status: if tanggal <= today -> Selesai else Mendatang --}}
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
                                // Example: compute progress placeholder (if you have evaluasi records, compute real progress)
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
