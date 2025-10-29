@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* Chart container to make canvas fill the area */
        .chart-container {
            position: relative;
            width: 100%;
            height: 320px;
        }

        .chart-container canvas {
            width: 100% !important;
            height: 100% !important;
        }

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
                        <div class="d-flex align-items-center">
                            <a class="text-muted text-decoration-none me-2" href="{{ route('anggota.index') }}">
                                Lihat data
                                <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">

            <div class="col-sm-6 col-md-3">
                <div class="card stat-card border-start-success shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-success text-uppercase mb-2">Jumlah Rapat</h6>
                            <h4 class="fw-bold mb-0">{{ $totalRapat }}</h4>
                        </div>
                        <i class="bi bi-calendar-event-fill fs-2 text-secondary opacity-25"></i>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-2">
                        <a class="icon-link icon-link-hover text-decoration-none" href="{{ route('rapat.index') }}">
                            Lihat data
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">
                                <path
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
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
                    <div class="card-footer bg-transparent border-0 p-2">
                        <a class="icon-link icon-link-hover text-decoration-none" href="{{ route('program_kerja.index') }}">
                            Lihat data
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">
                                <path
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
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
                    <div class="card-footer bg-transparent border-0 p-2">
                        <a class="icon-link icon-link-hover text-decoration-none" href="{{ route('evaluasi.index') }}">
                            Lihat data
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">
                                <path
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Statistik Bulanan Rapat dan Program Kerja</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="paymentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                    </div>
                    <div class="card-body">
                        @forelse($rapatTerbaru->take(3) as $rapat)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="w-100">
                                    <h5 class="mb-1">{{ $rapat->judul }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('j F Y') }}
                                        </small>
                                        <small class="text-muted">
                                            Rapat
                                        </small>
                                    </div>
                                </div>
                                <p class="mb-1">
                                    @if (\Carbon\Carbon::parse($rapat->tanggal)->isPast())
                                        <small class="text-success">
                                            <i class="fas fa-check-circle"></i>
                                            Selesai
                                        </small>
                                    @else
                                        <small class="text-warning">
                                            <i class="fas fa-clock"></i>
                                            Mendatang
                                        </small>
                                    @endif
                                </p>
                            </a>
                        @empty
                            <div class="alert alert-info">Belum ada rapat.</div>
                        @endforelse
                        @forelse($programTerbaru->take(2) as $program)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="w-100">
                                    <h5 class="mb-1">{{ $program->nama }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($program->target_date ?? now())->translatedFormat('j F Y') }}
                                        </small>
                                        <small class="text-muted">
                                            Program Kerja
                                        </small>
                                    </div>
                                </div>
                                <p class="mb-1">
                                    @if ($program->status == 'selesai')
                                        <small class="text-success">
                                            <i class="fas fa-check-circle"></i>
                                            Selesai
                                        </small>
                                    @elseif($program->status == 'berlangsung')
                                        <small class="text-warning">
                                            <i class="fas fa-clock"></i>
                                            Berlangsung
                                        </small>
                                    @else
                                        <small class="text-secondary">
                                            <i class="fas fa-circle"></i>
                                            Belum
                                        </small>
                                    @endif
                                </p>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    @endsection

    {{-- mengatur tabel pembayaran --}}
    <!-- Chart.js -->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/chartjs-plugin-datalabels.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('paymentChart');
            if (ctx) {
                const paymentChart = new Chart(ctx.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($monthlyData['labels']) !!},
                        datasets: [{
                                label: 'Rapat',
                                data: {!! json_encode($monthlyData['rapat']) !!},
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Program Kerja',
                                data: {!! json_encode($monthlyData['program']) !!},
                                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        plugins: {
                            datalabels: {
                                color: '#000',
                                anchor: 'end',
                                align: 'top',
                                formatter: function(value) {
                                    return value;
                                },
                                font: {
                                    weight: 'bold',
                                    size: 10
                                }
                            },
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grace: '10%', // Add 10% padding above the highest bar
                                ticks: {
                                    callback: function(value) {
                                        return value;
                                    }
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    },
                    plugins: [ChartDataLabels] // pastikan ini tidak error
                });
            }
        });
    </script>
