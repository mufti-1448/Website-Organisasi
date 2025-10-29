<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Pembayaran</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            /* disembunyikan default */
            width: 250px;
            height: 100vh;
            background-color: #4e73df;
            z-index: 1000;
            overflow-y: auto;
            transition: left 0.3s ease;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.9) !important;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white !important;
        }

        .sidebar-brand {
            color: white;
            text-decoration: none;
            padding: 20px;
            display: block;
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        /* Main Content */
        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        .main-content.shifted {
            margin-left: 250px;
        }

        /* Topbar */
        .topbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Responsive */
        @media (min-width: 768px) {
            .sidebar {
                left: 0;
            }

            .sidebar.hide {
                left: -250px;
            }

            .main-content {
                margin-left: 250px;
            }

            .main-content.full {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <a href="#" class="sidebar-brand">
            <i class="fas fa-graduation-cap me-2"></i>
            SPP Admin
        </a>

        <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}"
                class="sidebar-link sidebar-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
            <a href="{{ route('siswa.index') }}" class="sidebar-link">
                <i class="fas fa-user-graduate me-2"></i>
                Siswa
            </a>
            <a href="{{ route('kelas.index') }}"
                class="sidebar-link {{ request()->routeIs('kelas.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>
                Kelas
            </a>
            <a href="{{ route('spp.index') }}" class="sidebar-link">
                <i class="fas fa-money-bill-wave me-2"></i>
                SPP
            </a>
            <a href="{{ route('pembayaran.index') }}" class="sidebar-link">
                <i class="fas fa-receipt me-2"></i>
                Pembayaran
            </a>
            <a href="{{ route('logout') }}" class="sidebar-link mt-auto" onclick="logout()">
                <i class="fas fa-sign-out-alt me-2"></i>
                Logout
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Topbar -->
        <div class="topbar">
            <button class="btn btn-light" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="d-flex align-items-center">
                <span class="text-muted me-3">
                    <i class="fas fa-user-circle me-2"></i>
                    Administrator
                </span>
                <span class="text-muted small" id="currentTime"></span>
            </div>
        </div>

        {{ $slot }}

        <footer class="main-footer mt-4">
            <div class="container text-center py-3">
                <span class="text-muted">&copy; {{ date('Y') }} <code>Codepelita</code>. All rights
                    reserved.</span>
            </div>
        </footer>

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
        // toogle navbar
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('mainContent');

            // Untuk mobile
            sidebar.classList.toggle('show');

            // Untuk desktop
            if (window.innerWidth >= 768) {
                sidebar.classList.toggle('hide');
                content.classList.toggle('full');
            }
        });

        // login error
        document.addEventListener('DOMContentLoaded', function() {
            @error('email')
                var toastEl = document.getElementById('loginAlert');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            @enderror
        });

        // data table
        $(document).ready(function() {
            $('#dataTable').DataTable({
                autoWidth: false,
                paging: true,
                lengthChange: true,
                language: {
                    "decimal": "",
                    "emptyTable": "Tidak ada data yang tersedia di tabel",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Memuat...",
                    "processing": "Memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang cocok",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "next": ">",
                        "previous": "<"
                    },
                    "aria": {
                        "sortAscending": ": aktifkan untuk mengurutkan kolom secara menaik",
                        "sortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                    }
                },
            });
        });

        // Update current time
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('currentTime').textContent = now.toLocaleDateString('id-ID', options);
        }

        updateTime();
        setInterval(updateTime, 60000);

        // Logout function
        function logout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Simulate logout
                alert('Anda telah berhasil logout!');
                // In real application, redirect to login page
                // window.location.href = 'login.html';
            }
        }

        // menutup alert otomatis
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000); // 1 detik

        // Delete confirmation
        document.querySelectorAll('.btn-danger').forEach(btn => {
            if (btn.querySelector('.fa-trash')) {
                btn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        alert('Data berhasil dihapus!');
                        // In real application, send delete request to server
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.btn-detail');

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-*
                    const nisn = this.dataset.nisn;
                    const nis = this.dataset.nis;
                    const nama = this.dataset.nama;
                    const kelas = this.dataset.kelas;
                    const alamat = this.dataset.alamat;
                    const noTelp = this.dataset.no_telp;
                    const spp = this.dataset.spp;

                    // Masukkan data ke dalam modal
                    document.getElementById('nisn').textContent = nisn;
                    document.getElementById('nis').textContent = nis;
                    document.getElementById('nama').textContent = nama;
                    document.getElementById('kelas').textContent = kelas;
                    document.getElementById('alamat').textContent = alamat;
                    document.getElementById('no_telp').textContent = noTelp;
                    document.getElementById('spp').textContent = spp;
                });
            });
        });

        // // Fungsi untuk menghasilkan ID otomatis
        // function generateUserId() {
        //     const now = new Date();
        //     const timestamp = now.getTime();
        //     const uniqueId = 'USR' + timestamp.toString().slice(-5); // ambil 5 digit terakhir
        //     // Set value input
        //     document.getElementById('id_petugas').value = uniqueId;
        // }

        // // Panggil fungsi saat halaman dimuat
        // window.onload = generateUserId;

        // fungsi mencari data siswa
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const query = this.value;

            fetch(`/siswa/search?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('siswaTableBody');
                    tableBody.innerHTML = '';

                    data.forEach(siswa => {
                        const jumlahBayar = siswa.spp?.nominal || 0;
                        const row = `
                        <tr>
                            <td>${siswa.nis}</td>
                            <td>${siswa.nama}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" onclick="pilihSiswa('${siswa.nis}', '${siswa.nama}', '${jumlahBayar}')">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                    `;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });
                });
        });

        function pilihSiswa(nis, nama, jumlahBayar) {
            document.getElementById('nis').value = nis;
            document.getElementById('nama_siswa').value = nama;
            document.getElementById('jumlah_bayar').value = jumlahBayar;

            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalCariSiswa'));
            modal.hide();
        }
    </script>
</body>
</html>
