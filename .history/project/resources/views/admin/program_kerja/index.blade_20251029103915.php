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

        .modal-section {
            margin-bottom: 20px;
        }

        .modal-section h6 {
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-box p {
            margin-bottom: 6px;
        }

        .doc-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .badge-custom {
            padding: 6px 10px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 6px;
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

                                                    <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div>
    @foreach ($programKerja as $p)
        <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">{{ $p->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- BODY -->
                    <div class="modal-body">

                        <!-- Informasi Utama -->
                        <div class="modal-section info-box">
                            <h6><i class="bi bi-info-circle"></i> Informasi</h6>
                            <p><strong>Deskripsi:</strong> {{ $p->deskripsi ?? '-' }}</p>
                            <p><strong>Penanggung Jawab:</strong>
                                {{ $p->penanggungJawab->nama ?? '-' }}
                            </p>
                            <p><strong>Target Date:</strong>
                                {{ $p->target_date ? \Carbon\Carbon::parse($p->target_date)->format('d-m-Y') : '-' }}
                            </p>
                            <p>
                                <strong>Status:</strong>
                                <span
                                    class="badge-custom 
                            @if ($p->status == 'Selesai') bg-success text-white
                            @elseif($p->status == 'Berlangsung') bg-info text-dark
                            @else bg-secondary text-white @endif">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </p>
                        </div>

                        <!-- Notulen -->
                        <div class="modal-section">
                            <h6><i class="bi bi-file-earmark-text"></i> Notulen</h6>
                            @forelse ($p->notulen as $n)
                                <a href="{{ asset('storage/' . $n->file_path) }}" target="_blank">📄 Lihat Notulen</a><br>
                            @empty
                                <small class="text-muted">Belum ada notulen</small>
                            @endforelse
                        </div>

                        <!-- Dokumentasi -->
                        <div class="modal-section">
                            <h6><i class="bi bi-images"></i> Dokumentasi</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @forelse ($p->dokumentasi as $d)
                                    <div>
                                        <img src="{{ asset('storage/' . $d->foto) }}" class="doc-img">
                                        <small class="d-block">{{ $d->judul }}</small>
                                    </div>
                                @empty
                                    <small class="text-muted">Tidak ada dokumentasi</small>
                                @endforelse
                            </div>
                        </div>

                        <!-- Evaluasi -->
                        <div class="modal-section">
                            <h6><i class="bi bi-check2-circle"></i> Evaluasi</h6>
                            @forelse ($p->evaluasi as $e)
                                <a href="{{ asset('storage/' . $e->file) }}" target="_blank">📄 Lihat Evaluasi</a><br>
                            @empty
                                <small class="text-muted">Belum ada evaluasi</small>
                            @endforelse
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer border-0">
                        <button class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
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
