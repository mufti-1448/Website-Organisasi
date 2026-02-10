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
    <div class="container-fluid p-4">
        <h1 class="h3 mb-4 text-gray-800">Cari Data Siswa & Pembayaran</h1>

        <!-- Search Container -->
        <div class="search-container">
            <h5 class="mb-3">Pencarian Data Siswa</h5>
            <form method="GET" action="{{ route('user.search') }}" id="searchForm">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary btn-search w-100">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <!-- Payment Detail Modal -->
    {{-- <div class="modal fade" id="paymentDetailModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <strong>ID Pembayaran:</strong> <span id="modalPaymentId">001</span>
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal Bayar:</strong> <span id="modalPaymentDate">01/11/2024</span>
                    </div>
                    <div class="mb-3">
                        <strong>Bulan Dibayar:</strong> <span id="modalPaymentMonth">November</span>
                    </div>
                    <div class="mb-3">
                        <strong>Tahun Dibayar:</strong> <span id="modalPaymentYear">2024</span>
                    </div>
                    <div class="mb-3">
                        <strong>Jumlah:</strong> <span id="modalPaymentAmount">Rp 150.000</span>
                    </div>
                    <div class="mb-3">
                        <strong>Metode Pembayaran:</strong> <span id="modalPaymentMethod">Cash</span>
                    </div>
                    <div class="mb-3">
                        <strong>Petugas:</strong> <span id="modalPaymentOfficer">Administrator</span>
                    </div>
                    <div class="mb-3">
                        <strong>Keterangan:</strong> <span id="modalPaymentNote">Pembayaran SPP bulan November</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Cetak Bukti</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>

    <script>

    </script>
</body>
</html>
