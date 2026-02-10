@extends('admin.layouts.app')

@section('title', 'Daftar Notulen')

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
            <h4 class="page-title mb-1">Data Notulen</h4>
            <small class="text-muted">Kelola data notulen Dewan Ambalan</small>
        </div>
        <a href="{{ route('notulen.create') }}" class="btn btn-primary shadow-sm">
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
                            <th>File</th>
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
                                <td>
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
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $n->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <a href="{{ route('notulen.edit', $n->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('notulen.destroy', $n->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus notulen ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Belum ada data notulen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan detail notulen -->
    @foreach ($notulen as $n)
        <div class="modal fade" id="showModal{{ $n->id }}" tabindex="-1"
            aria-labelledby="showModalLabel{{ $n->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel{{ $n->id }}">Detail Notulen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <dl class="row">
                                    <dt class="col-sm-3">ID Notulen</dt>
                                    <dd class="col-sm-9">{{ $n->id }}</dd>

                                    <dt class="col-sm-3">Judul</dt>
                                    <dd class="col-sm-9">{{ $n->judul }}</dd>

                                    <dt class="col-sm-3">Rapat</dt>
                                    <dd class="col-sm-9">{{ $n->rapat->judul ?? '-' }}</dd>

                                    <dt class="col-sm-3">Penulis</dt>
                                    <dd class="col-sm-9">{{ $n->penulis->nama ?? '-' }}</dd>

                                    <dt class="col-sm-3">Tanggal</dt>
                                    <dd class="col-sm-9">{{ $n->tanggal }}</dd>

                                    <dt class="col-sm-3">Waktu</dt>
                                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($n->waktu)->format('H:i') }}</dd>

                                    <dt class="col-sm-3">Isi Notulen</dt>
                                    <dd class="col-sm-9">
                                        <div class="border p-3 bg-light">{!! nl2br(e($n->isi)) !!}</div>
                                    </dd>

                                    <dt class="col-sm-3">File Notulen</dt>
                                    <dd class="col-sm-9">
                                        @if ($n->file_path)
                                            <a href="{{ asset('storage/' . $n->file_path) }}" target="_blank"
                                                class="btn btn-outline-primary">
                                                <i class="bi bi-download"></i> Unduh File
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada file</span>
                                        @endif
                                    </dd>

                                    <dt class="col-sm-3">Dibuat</dt>
                                    <dd class="col-sm-9">
                                        {{ $n->created_at ? $n->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                                    </dd>

                                    <dt class="col-sm-3">Diupdate</dt>
                                    <dd class="col-sm-9">
                                        {{ $n->updated_at ? $n->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="{{ route('notulen.edit', $n->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
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
    </script>
@endsection
