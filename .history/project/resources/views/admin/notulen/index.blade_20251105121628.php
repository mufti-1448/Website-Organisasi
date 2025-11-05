@extends('admin.layouts.app')

@section('title', 'Daftar Notulen')

@section('content')
    <style>
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
            <h4 class="page-title mb-1">Data Notulen</h4>
            <small class="text-muted">Kelola data notulen Dewan Ambalan</small>
        </div>
        <a href="{{ route('admin.notulen.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Notulen
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="notulenTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th class="text-center">File</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notulen as $n)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $n->id }}</td>
                                <td style="max-width:200px;">
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                        title="{{ $n->judul }}">
                                        {{ $n->judul }}
                                    </span>
                                </td>
                                <td>{{ $n->penulis->nama ?? '-' }}</td>
                                <td>{{ $n->tanggal }}</td>
                                <td>{{ \Carbon\Carbon::parse($n->waktu)->format('H:i') }}</td>
                                <td class="text-center">
                                    @if ($n->file_path)
                                        <a href="{{ asset('storage/' . $n->file_path) }}" target="_blank"
                                            class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-file-earmark-arrow-down"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="text-center btn-action">
                                    <a href="{{ route('admin.notulen.show', $n->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.notulen.edit', $n->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $n->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="modalDelete{{ $n->id }}" tabindex="-1"
                                        aria-labelledby="modalDeleteLabel{{ $n->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow-sm">

                                                <!-- Icon & Title Section -->
                                                <div class="text-center pt-4 pb-2">
                                                    <i class="bi bi-trash3 text-danger" style="font-size: 3rem;"></i>
                                                    <h5 class="mt-3 fw-semibold">Hapus Data?</h5>
                                                </div>

                                                <div class="modal-body text-center text-muted">
                                                    Data <strong>{{ $n->judul }}</strong> akan dihapus secara permanen.
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="modal-footer border-0 justify-content-center pb-4 gap-2">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Batal</button>

                                                    <form action="{{ route('admin.notulen.destroy', $n->id) }}" method="POST"
                                                        class="d-inline">
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
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#notulenTable').DataTable({
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
