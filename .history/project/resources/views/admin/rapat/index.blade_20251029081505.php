@extends('admin.layouts.app')

@section('title', 'Daftar Rapat')

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
            <h4 class="page-title mb-1">Data Rapat</h4>
            <small class="text-muted">Kelola data rapat Dewan Ambalan</small>
        </div>
        <a href="{{ route('rapat.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Rapat
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="rapatTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rapat as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td style="max-width:200px;">
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                        title="{{ $item->judul }}">
                                        {{ $item->judul }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}</td>
                                <td>{{ $item->tempat }}</td>
                                <td class="text-center">
                                    @if ($item->status == 'belum')
                                        <span class="badge bg-primary">{{ ucfirst($item->status) }}</span>
                                    @elseif($item->status == 'berlangsung')
                                        <span class="badge bg-warning text-dark">{{ ucfirst($item->status) }}</span>
                                    @else($item->status == 'selesai')
                                        <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-center btn-action">
                                    {{-- <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal"
                                        onclick="viewRapat('{{ $item->id }}')"><i class="bi bi-eye"></i></button> --}}
                                    <a href="{{ route('rapat.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="{{ route('rapat.destroy', $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada rapat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal View Rapat -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Detail Rapat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- Content will be loaded here via AJAX -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function viewRapat(id) {
            fetch(`/rapat/${id}`)
                .then(response => response.text())
                .then(html => {
                    // Extract the content from the full HTML response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const content = doc.querySelector('.container.mt-4').innerHTML;

                    // Remove the "Kembali" button from modal
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = content;
                    const kembaliBtn = tempDiv.querySelector('.btn-secondary');
                    if (kembaliBtn) kembaliBtn.remove();

                    document.getElementById('modalContent').innerHTML = tempDiv.innerHTML;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('modalContent').innerHTML =
                        '<p class="text-danger">Terjadi kesalahan saat memuat data.</p>';
                });
        }
    </script>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#rapatTable').DataTable({
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
