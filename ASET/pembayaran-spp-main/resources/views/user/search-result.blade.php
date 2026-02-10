<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - Sistem Pembayaran SPP</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <style>
        body{background-color:#f8f9fc;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}.navbar{background-color:#4e73df!important;box-shadow:0 .15rem 1.75rem 0 rgba(58,59,69,.15)}.search-container,.student-card,.payment-history,.not-found{background:#fff;border-radius:10px;box-shadow:0 .15rem 1.75rem 0 rgba(58,59,69,.15)}.search-container{padding:30px;margin:30px 0}.student-card{padding:20px;margin-bottom:30px}.payment-history{padding:20px}.status-lunas{color:#1cc88a;font-weight:700}.status-belum-lunas{color:#e74a3b;font-weight:700}.status-pending{color:#f6c23e;font-weight:700}.btn-search{background-color:#4e73df;border-color:#4e73df}.btn-search:hover{background-color:#2e59d9;border-color:#2653d4}.not-found{text-align:center;padding:40px;margin:30px 0}.print-btn{background-color:#36b9cc;border-color:#36b9cc}.print-btn:hover{background-color:#2c9faf;border-color:#2a96a5}@media(max-width:768px){.student-photo{margin:0 auto 20px;display:block}}
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                SPP User Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Login Administrator
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-3">
        <a href="{{ route('user.search') }}" class="btn btn-secondary mb-2">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
        <!-- Not Found Message -->
        @if (isset($pembayaran) && $pembayaran->isEmpty())
            <div class="not-found">
                <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                <h4>Data Siswa Tidak Ditemukan</h4>
                <p class="text-muted">Pastikan NIS atau Nama Lengkap yang Anda masukkan sudah benar</p>
            </div>
        @endif

        <!-- Student Card -->
        @if ($pembayaran->isNotEmpty())
            @php
                $siswa = $pembayaran->first()->siswa;
            @endphp
            <div class="student-card">
                <div class="d-flex flex-column flex-md-row">
                    <div class="ms-md-4 flex-grow-1">
                        {{-- <h4 class="mb-3">Nama Siswa: {{ $siswa->nama }}</h4> --}}
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <strong>Nama Siswa:</strong> <span>{{ $siswa->nama }} - {{ $siswa->nis }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Kelas:</strong> <span>{{ $siswa->kelas->nama_kelas ?? '-' }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Alamat:</strong> <span>{{ $siswa->alamat }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>No. Telepon:</strong> <span>{{ $siswa->no_telp }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!-- Payment History -->
        <div class="payment-history">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h5 class="mb-0">Riwayat Pembayaran</h5>
                @if ($pembayaran->isNotEmpty())
                    <a href="{{ route('user.search.print', request()->only(['nis', 'nama'])) }}"
                        class="btn btn-success mb-3" target="_blank" id="btnPrint">
                        <i class="fas fa-print me-2"></i> Cetak Riwayat
                    </a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pembayaran</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Tahun Dibayar</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Data Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->id_pembayaran }}</td>
                                <td>{{ $p->tgl_bayar }}</td>
                                <td>{{ $p->bulan_dibayar }}</td>
                                <td>{{ $p->tahun_dibayar }}</td>
                                <td>{{ $p->jumlah_bayar }}</td>
                                <td><span
                                        class="{{ $p->keterangan === 'Lunas' ? 'status-lunas' : 'status-belum-lunas' }}">
                                        {{ $p->keterangan }}
                                    </span></td>
                                <td>{{ $p->updated_at }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" title="Bayar Sekarang" data-bs-toggle="modal"
                                        data-bs-target="#alertModal">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Fitur Dalam Pengembangan
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>
