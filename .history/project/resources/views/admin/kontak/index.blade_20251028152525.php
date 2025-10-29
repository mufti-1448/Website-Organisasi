@extends('admin.layouts.app')

@section('title', 'Pesan Masuk')

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

        .social-card {
            border-radius: 12px;
        }

        .alert {
            border-radius: 10px;
        }

        <style>
    /* Bikin semua card konsisten */
    .stat-card {
        border-radius: 10px;
        border-left: 6px solid #0d6efd; /* warna misalnya biru */
        box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);
        min-height: 140px; /* tingginya sama semua */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    /* Konten dalam card ditata rapi */
    .stat-card .card-body {
        text-align: center;
        padding: 0;
    }

    /* Judul seragam */
    .stat-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #2b3035;
    }

    /* Angkanya seragam */
    .stat-value {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 0;
        color: #0d6efd;
    }
</style>

    </style>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="page-title mb-1">Data Pesan Masuk</h4>
            <small class="text-muted">Kelola pesan masuk dari kontak Dewan Ambalan</small>
        </div>
    </div>

    {{-- TABEL --}}
    <div class="card card-custom mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover" id="kontakTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kontak as $k)
                        <tr>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->tanggal }}</td>
                            <td class="text-center">
                                @if ($k->status == 'belum')
                                    <span class="badge bg-primary">{{ ucfirst($k->status) }}</span>
                                @elseif($k->status == 'berlangsung')
                                    <span class="badge bg-warning text-dark">{{ ucfirst($k->status) }}</span>
                                @else
                                    <span class="badge bg-success">{{ ucfirst($k->status) }}</span>
                                @endif
                            </td>

                            <td class="text-center btn-action d-flex justify-content-center">
                                <a href="{{ route('kontak.show', $k->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('kontak.reply', $k->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-reply"></i>
                                </a>

                                <form action="{{ route('kontak.destroy', $k->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                    @csrf @method('DELETE')
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

    {{-- Media Sosial --}}
    <h4 class="mb-2"><i class="bi bi-share"></i> Media Sosial</h4>
    <p class="text-muted mb-4">Kelola link & status aktif media sosial organisasi.</p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="page-title mb-1">Data Pesan Masuk</h4>
            <small class="text-muted">Kelola pesan masuk dari kontak Dewan Ambalan</small>
        </div>
    </div>

    <form action="{{ route('kontak.updateSosial') }}" method="POST">
        @csrf

        <div class="row g-4">
            @php
                $platforms = [
                    'facebook' => ['label' => 'Facebook', 'icon' => 'facebook text-primary'],
                    'instagram' => ['label' => 'Instagram', 'icon' => 'instagram text-danger'],
                    'twitter' => ['label' => 'Twitter', 'icon' => 'twitter text-info'],
                    'youtube' => ['label' => 'YouTube', 'icon' => 'youtube text-danger'],
                ];
            @endphp

            @foreach ($platforms as $key => $social)
                @php $active = $sosialMedia->get($key)->aktif ?? false; @endphp

                <div class="col-md-6">
                    <div class="card social-card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0">
                                    <i class="bi bi-{{ $social['icon'] }} me-1"></i> {{ $social['label'] }}
                                </h5>
                                <span class="badge {{ $active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </div>

                            <label class="form-label small fw-semibold">URL</label>
                            <input type="url" class="form-control form-control-sm" name="{{ $key }}_url"
                                value="{{ $sosialMedia->get($key)->url ?? '' }}">

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="{{ $key }}_aktif" value="1"
                                    {{ $active ? 'checked' : '' }}>
                                <label class="form-check-label small">Aktifkan Platform</label>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-4 px-4">
            <i class="bi bi-save"></i> Simpan Perubahan
        </button>
    </form>

@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#kontakTable').DataTable({
            responsive: true,
            dom: '<"d-flex justify-content-between align-items-center mb-3"Bf>rt<"d-flex justify-content-between align-items-center mt-3"ip>',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: {
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
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
