@extends('admin.layouts.app')

@section('title', 'Daftar Dokumentasi')

@section('content')
    <style>
        /* Title & Page Section */
        .page-title {
            font-size: 24px;
            font-weight: 700;
        }

        /* Card Styling */
        .card-custom {
            border: none;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        /* Table Design */
        .table thead {
            background: #f7faff;
            border-bottom: 2px solid #e1e7ef;
        }

        .table tbody tr:hover {
            background-color: #f3f7ff;
            transition: 0.2s;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        /* Photo Styling */
        .doc-photo {
            width: 60px;
            height: 45px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid #e3e6f0;
        }

        /* Actions button group */
        .btn-action {
            gap: 5px;
        }

        /* Search input styling */
        .dataTables_filter input {
            border-radius: 8px !important;
            padding: 6px 10px;
        }

        /* Pagination styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 12px !important;
            border-radius: 8px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #0d6efd !important;
            color: #fff !important;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="page-title mb-1">Data Dokumentasi</h4>
            <small class="text-muted">Kelola data dokumentasi Dewan Ambalan</small>
        </div>
        <a href="{{ route('dokumentasi.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Dokumentasi
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="dokumentasiTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>ID</th>
                            <th class="text-center">Foto</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokumentasis as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td class="text-center">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="doc-photo">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width: 60px; height: 45px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td style="max-width:200px;">
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                        title="{{ $item->judul }}">
                                        {{ $item->judul }}
                                    </span>
                                </td>
                                <td>{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $item->kategori ?? '-' }}</td>
                                <td class="text-center btn-action">
                                    <a href="{{ route('dokumentasi.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('dokumentasi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modalDeleteLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow-sm">
                                                <!-- Icon & Title Section -->
                                                <div class="text-center pt-4 pb-2">
                                                    <i class="bi bi-trash3 text-danger" style="font-size: 3rem;"></i>
                                                    <h5 class="mt-3 fw-semibold">Hapus Data?</h5>
                                                </div>
                                                <div class="modal-body text-center text-muted">
                                                    Data <strong>{{ $item->judul }}</strong> akan dihapus secara permanen.
                                                </div>
                                                <!-- Action Buttons -->
                                                <div class="modal-footer border-0 justify-content-center pb-4 gap-2">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('dokumentasi.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger px-4">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dokumentasiTable').DataTable({
                responsive: true,
                dom: '<"d-flex justify-content-between align-items-center mb-3"Bf>rt<"d-flex justify-content-between align-items-center mt-3"ip>',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                language: {
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sSearch": "Cari:",
                    "oPaginate": {
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya"
                    }
                }
            });
        });
        // Auto dismiss alert after 5 seconds (5000ms)
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000);
    </script>
@endsection
