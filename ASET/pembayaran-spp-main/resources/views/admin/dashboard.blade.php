<x-app-layout>
    <!-- Page Content -->
    <div class="container-fluid p-4" id="pageContent">
        <!-- Dashboard Page -->
        <div id="dashboardPage" class="page">
            <h1 class="h3 mb-4">Selamat Datang {{ Auth::user()->name }}</h1>

            <!-- Stat Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-primary shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Siswa
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <a href="{{ route('siswa.index') }}"
                                class="position-absolute small text-secondary font-italic"
                                style="bottom: 10px; right: 15px; text-decoration: none;">
                                Lihat Data <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-success shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Kelas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <a href="{{ route('kelas.index') }}"
                                class="position-absolute small text-secondary font-italic"
                                style="bottom: 10px; right: 15px; text-decoration: none;">
                                Lihat Data <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-info shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Pembayaran Bulan Ini
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $totalpembayaran }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-warning shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Menunggak
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ket }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="position-absolute small text-secondary font-italic"
                            style="bottom: 10px; right: 15px; text-decoration: none;" data-bs-toggle="modal"
                            data-bs-target="#modalMenunggak">
                            Lihat Data <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-7 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Pembayaran SPP</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="paymentChart" height="100"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Pembayaran Terbaru</h6>
                        </div>
                        <div class="card-body">
                            @forelse($pembayaran as $item)
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="w-100">
                                        <h5 class="mb-1">{{ $item->siswa->nama ?? '-' }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">
                                                NIS: {{ $item->siswa->nis ?? '-' }}
                                            </small>
                                            <small class="text-muted">
                                                {{ \Carbon\Carbon::parse($item->tgl_bayar)->format('d M Y H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                    <p class="mb-1">
                                        {{ $item->siswa->kelas->nama_kelas ?? '-' }} -
                                        Rp{{ number_format($item->jumlah_bayar, 0, ',', '.') }}
                                    </p>

                                    <small class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                        {{ $item->keterangan ?? 'Lunas' }}
                                    </small>
                                </a>
                            @empty
                                <div class="alert alert-info">Belum ada data pembayaran.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Lihat Data Tunggakan -->
        <div class="modal fade" id="modalMenunggak" tabindex="-1" role="dialog" aria-labelledby="modalMenunggakLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h5 class="modal-title" id="riwayatModalLabel">Data Siswa Yang Menunggak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($menunggakdata->isEmpty())
                            <p>Tidak ada siswa yang menunggak pembayaran.</p>
                        @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Bulan Kekurangan</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menunggakdata as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->bulan_dibayar }}</td>
                                            <td>{{ $item->jumlah_bayar }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- mengatur tabel pembayaran --}}
    <!-- Chart.js -->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/chartjs-plugin-datalabels.min.js') }}"></script>
    <script>
    const ctx = document.getElementById('paymentChart');
    if (ctx) {
        const paymentChart = new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [
                    {
                        label: 'Lunas',
                        data: {!! json_encode($lunasTotals) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Menunggak',
                        data: {!! json_encode($menunggakTotals) !!},
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
                            return 'Rp' + value.toLocaleString();
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
                        ticks: {
                            callback: function(value) {
                                return 'Rp' + value.toLocaleString();
                            }
                        }
                    }
                },
                responsive: true
            },
            plugins: [ChartDataLabels] // pastikan ini tidak error
        });
    }
</script>
</x-app-layout>
