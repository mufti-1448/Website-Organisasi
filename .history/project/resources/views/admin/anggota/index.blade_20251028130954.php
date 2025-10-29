@extends('admin.layouts.app')

@section('title', 'Daftar Anggota')

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
        .user-photo {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e3e6f0;
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
            <h4 class="page-title mb-1">Data Anggota</h4>
            <small class="text-muted">Kelola data anggota Dewan Ambalan</small>
        </div>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Anggota
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="anggotaTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Kontak</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">
                                    <img src="{{ $item->foto ? asset('storage/uploads/anggota/' . $item->foto) : 'https://ui-avatars.com/api/?name=' . $item->nama }}"
                                        class="user-photo">
                                </td>
                                <td class="fw-semibold text-center">{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->kelas }}</td>
                                <td class="text-center">{{ $item->jabatan }}</td>
                                <td class="text-center">{{ $item->kontak }}</td>
                                <td class="text-center btn-action">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $item->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus?')" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
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


    <!-- Modal untuk menampilkan detail anggota -->
    @foreach ($anggota as $item)
        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="showModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel{{ $item->id }}">Detail Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}"
                                        alt="Foto {{ $item->nama }}" class="img-fluid rounded mb-3"
                                        style="max-width: 200px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                        style="width: 200px; height: 200px; margin: 0 auto;">
                                        <i class="bi bi-person-circle" style="font-size: 5rem; color: #6c757d;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <dl class="row">
                                    <dt class="col-sm-4">ID Anggota</dt>
                                    <dd class="col-sm-8">{{ $item->id }}</dd>

                                    <dt class="col-sm-4">Nama</dt>
                                    <dd class="col-sm-8">{{ $item->nama }}</dd>

                                    <dt class="col-sm-4">Kelas</dt>
                                    <dd class="col-sm-8">{{ $item->kelas }}</dd>

                                    <dt class="col-sm-4">Jabatan</dt>
                                    <dd class="col-sm-8">{{ $item->jabatan }}</dd>

                                    <dt class="col-sm-4">Kontak</dt>
                                    <dd class="col-sm-8">{{ $item->kontak }}</dd>

                                    <dt class="col-sm-4">Dibuat</dt>
                                    <dd class="col-sm-8">
                                        {{ $item->created_at ? $item->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                                    </dd>

                                    <dt class="col-sm-4">Diupdate</dt>
                                    <dd class="col-sm-8">
                                        {{ $item->updated_at ? $item->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#anggotaTable').DataTable({
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
