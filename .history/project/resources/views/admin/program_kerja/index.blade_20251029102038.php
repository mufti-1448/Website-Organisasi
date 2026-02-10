@extends('admin.layouts.app')

@section('title', 'Daftar Program Kerja')

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
            <h4 class="page-title mb-1">Data Program Kerja</h4>
            <small class="text-muted">Kelola data program kerja Dewan Ambalan</small>
        </div>
        <a href="{{ route('program_kerja.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Program Kerja
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="program-kerjaTable">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">ID</th>
                            <th>Nama</th>
                            <th>Penanggung Jawab</th>
                            <th>Target Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programKerja as $p)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $p->id }}</td>
                                <td style="max-width:200px;">
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                        title="{{ $p->nama }}">
                                        {{ $p->nama }}
                                    </span>
                                </td>
                                <td>{{ $p->penanggungJawab->nama ?? '-' }}</td>
                                <td>{{ $p->target_date ? \Carbon\Carbon::parse($p->target_date)->format('d-m-Y') : '-' }}
                                </td>
                                <td class="text-center">
                                    @if ($p->status == 'belum')
                                        <span class="badge bg-primary">{{ ucfirst($p->status) }}</span>
                                    @elseif($p->status == 'berlangsung')
                                        <span class="badge bg-warning text-dark">{{ ucfirst($p->status) }}</span>
                                    @else($item->status == 'selesai')
                                        <span class="badge bg-success">{{ ucfirst($p->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-center btn-action">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $p->id }}"><i class="bi bi-eye"></i></button>
                                    <a href="{{ route('program_kerja.edit', $p->id) }}" class="btn btn-sm btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="{{ route('program_kerja.destroy', $p->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus program ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Detail Program Kerja -->
    @foreach ($programKerja as $p)
        <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-semibold" id="detailModalLabel{{ $p->id }}">
                            <i class="bi bi-info-circle"></i> Detail Program Kerja
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Informasi Utama -->
                        <div class="p-3 mb-3 rounded border">
                            <h6 class="fw-bold mb-3"><i class="bi bi-folder2-open"></i> Informasi Utama</h6>
                            <p><strong>Nama:</strong> {{ $p->nama }}</p>
                            <p><strong>Deskripsi:</strong> {{ $p->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                            <p><strong>Penanggung Jawab:</strong> {{ $p->penanggungJawab->nama ?? 'Belum ditentukan' }}</p>
                            <p><strong>Target Date:</strong>
                                {{ $p->target_date ? \Carbon\Carbon::parse($p->target_date)->format('d-m-Y') : '-' }}
                            </p>
                            <p><strong>Status:</strong>
                                <span
                                    class="badge 
                            @switch($p->status)
                                @case('Belum') bg-warning text-dark @break
                                @case('Berlangsung') bg-info text-dark @break
                                @case('Selesai') bg-success @break
                                @default bg-secondary
                            @endswitch">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </p>
                        </div>

                        <!-- Notulen -->
                        <div class="mb-3">
                            <h6 class="fw-bold"><i class="bi bi-file-earmark-text"></i> Notulen</h6>
                            @forelse ($p->notulen as $n)
                                <a href="{{ asset('storage/' . $n->file_path) }}" target="_blank"
                                    class="d-block text-decoration-none">
                                    📄 Lihat Notulen
                                </a>
                            @empty
                                <p class="text-muted">Belum ada notulen</p>
                            @endforelse
                        </div>

                        <!-- Dokumentasi -->
                        <div class="mb-3">
                            <h6 class="fw-bold"><i class="bi bi-image"></i> Dokumentasi</h6>
                            <div class="d-flex flex-wrap gap-3">
                                @forelse ($p->dokumentasi as $d)
                                    @if ($d->foto)
                                        <div class="text-center">
                                            <img src="{{ asset('storage/' . $d->foto) }}" class="rounded border"
                                                style="width: 100px; height: 80px; object-fit: cover;">
                                            <small class="d-block">{{ $d->judul }}</small>
                                        </div>
                                    @else
                                        <p class="text-muted">Tidak ada gambar</p>
                                    @endif
                                @empty
                                    <p class="text-muted">Belum ada dokumentasi</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Evaluasi -->
                        <div>
                            <h6 class="fw-bold"><i class="bi bi-file-earmark-check"></i> Evaluasi</h6>
                            @forelse ($p->evaluasi as $e)
                                <a href="{{ asset('storage/' . $e->file) }}" target="_blank"
                                    class="d-block text-decoration-none">
                                    📄 Lihat Evaluasi
                                </a>
                            @empty
                                <p class="text-muted">Belum ada evaluasi</p>
                            @endforelse
                        </div>

                    </div>

                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Tutup
                        </button>
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
            $('#program-kerjaTable').DataTable({
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
