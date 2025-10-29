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

        .form-control-sm {
            border-radius: 8px;
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
            <h4 class="page-title mb-1">Data Pesan Masuk</h4>
            <small class="text-muted">Kelola pesan masuk dari kontak Dewan Ambalan</small>
        </div>
    </div>

    <div class="card card-custom">
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
                                <td>
                                    @if ($k->status == 'belum')
                                        <span class="badge bg-primary">{{ ucfirst($k->status) }}</span>
                                    @elseif($k->status == 'berlangsung')
                                        <span class="badge bg-warning text-dark">{{ ucfirst($k->status) }}</span>
                                    @else($k->status == 'selesai')
                                        <span class="badge bg-success">{{ ucfirst($k->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-center btn-action">
                                    <a href="{{ route('kontak.show', $k->id) }}" class="btn btn-sm btn-info"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="{{ route('kontak.reply', $k->id) }}" class="btn btn-sm btn-primary"><i
                                            class="bi bi-reply"></i></a>
                                    <form action="{{ route('kontak.destroy', $k->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
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

    <h3 class="mb-2 mt-"><i class="bi bi-share"></i> Media Sosial</h3>
    <p class="text-muted mb-4">Kelola link & status aktif media sosial organisasi.</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kontak.updateSosial') }}" method="POST">
        @csrf

        <div class="row g-4">

            {{-- Facebook --}}
            <div class="col-md-6">
                <div class="card social-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0"><i class="bi bi-facebook text-primary me-1"></i> Facebook</h5>
                            @php $fb = $sosialMedia->get('facebook')->aktif ?? false; @endphp
                            <span class="badge {{ $fb ? 'bg-success' : 'bg-secondary' }}">
                                {{ $fb ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <label class="form-label small fw-semibold">URL</label>
                        <input type="url" class="form-control form-control-sm" name="facebook_url"
                            value="{{ $sosialMedia->get('facebook')->url ?? '' }}">

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="facebook_aktif" value="1"
                                {{ $fb ? 'checked' : '' }}>
                            <label class="form-check-label small">Aktifkan Platform</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Instagram --}}
            <div class="col-md-6">
                <div class="card social-card shadow-sm">
                    <div class="card-body">
                        @php $ig = $sosialMedia->get('instagram')->aktif ?? false; @endphp
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0"><i class="bi bi-instagram text-danger me-1"></i> Instagram</h5>
                            <span class="badge {{ $ig ? 'bg-success' : 'bg-secondary' }}">
                                {{ $ig ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <label class="form-label small fw-semibold">URL</label>
                        <input type="url" class="form-control form-control-sm" name="instagram_url"
                            value="{{ $sosialMedia->get('instagram')->url ?? '' }}">

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="instagram_aktif" value="1"
                                {{ $ig ? 'checked' : '' }}>
                            <label class="form-check-label small">Aktifkan Platform</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Twitter --}}
            <div class="col-md-6">
                <div class="card social-card shadow-sm">
                    <div class="card-body">
                        @php $tw = $sosialMedia->get('twitter')->aktif ?? false; @endphp
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0"><i class="bi bi-twitter text-info me-1"></i> Twitter</h5>
                            <span class="badge {{ $tw ? 'bg-success' : 'bg-secondary' }}">
                                {{ $tw ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <label class="form-label small fw-semibold">URL</label>
                        <input type="url" class="form-control form-control-sm" name="twitter_url"
                            value="{{ $sosialMedia->get('twitter')->url ?? '' }}">

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="twitter_aktif" value="1"
                                {{ $tw ? 'checked' : '' }}>
                            <label class="form-check-label small">Aktifkan Platform</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- LinkedIn --}}
            <div class="col-md-6">
                <div class="card social-card shadow-sm">
                    <div class="card-body">
                        @php $li = $sosialMedia->get('linkedin')->aktif ?? false; @endphp
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0"><i class="bi bi-linkedin text-primary me-1"></i> LinkedIn</h5>
                            <span class="badge {{ $li ? 'bg-success' : 'bg-secondary' }}">
                                {{ $li ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <label class="form-label small fw-semibold">URL</label>
                        <input type="url" class="form-control form-control-sm" name="linkedin_url"
                            value="{{ $sosialMedia->get('linkedin')->url ?? '' }}">

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="linkedin_aktif" value="1"
                                {{ $li ? 'checked' : '' }}>
                            <label class="form-check-label small">Aktifkan Platform</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- YouTube --}}
            <div class="col-md-6">
                <div class="card social-card shadow-sm">
                    <div class="card-body">
                        @php $yt = $sosialMedia->get('youtube')->aktif ?? false; @endphp
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0"><i class="bi bi-youtube text-danger me-1"></i> YouTube</h5>
                            <span class="badge {{ $yt ? 'bg-success' : 'bg-secondary' }}">
                                {{ $yt ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <label class="form-label small fw-semibold">URL</label>
                        <input type="url" class="form-control form-control-sm" name="youtube_url"
                            value="{{ $sosialMedia->get('youtube')->url ?? '' }}">

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="youtube_aktif" value="1"
                                {{ $yt ? 'checked' : '' }}>
                            <label class="form-check-label small">Aktifkan Platform</label>
                        </div>
                    </div>
                </div>
            </div>

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
