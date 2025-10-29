@extends('admin.layouts.app')

@section('title', 'Daftar Evaluasi')

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
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="page-title mb-1">Data Evaluasi</h4>
            <small class="text-muted">Kelola data evaluasi Dewan Ambalan</small>
        </div>
        <a href="{{ route('evaluasi.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Evaluasi
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="evaluasiTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluasi as $index => $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td style="max-width:200px;">
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                        title="{{ $p->nama }}">
                                        {{ $p->nama}}
                                    </span>
                                </td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>
                                    @if ($item->file)
                                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                            class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-file-earmark-arrow-down"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="text-center btn-action">
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $item->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <a href="{{ route('evaluasi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('evaluasi.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modals for each evaluasi -->
    @foreach ($evaluasi as $item)
        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="showModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel{{ $item->id }}">Detail Evaluasi -
                            {{ $item->judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> {{ $item->id }}</p>
                        <p><strong>Program Kerja:</strong> {{ $item->programKerja->nama ?? '-' }}</p>
                        <p><strong>Judul:</strong> {{ $item->judul }}</p>
                        <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                        <p><strong>Penulis:</strong> {{ $item->penulis }}</p>
                        <p><strong>Isi:</strong><br>{{ $item->isi }}</p>
                        <p><strong>File:</strong></p>
                        @if ($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                class="btn btn-outline-primary">
                                <i class="bi bi-download"></i> Lihat File
                            </a>
                        @else
                            <span class="text-muted">Tidak ada file</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#evaluasiTable').DataTable({
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
</script>
@endsection
