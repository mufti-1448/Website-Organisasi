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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kontak as $k)
                            <tr>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->email }}</td>
                                <td>{{ $k->tanggal }}</td>
                                <td>
                                    <span class="badge {{ $k->status === 'baru' ? 'bg-warning' : 'bg-success' }}">
                                        {{ ucfirst($k->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('kontak.show', $k->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="{{ route('kontak.reply', $k->id) }}" class="btn btn-sm btn-primary">Balas</a>
                                    <form action="{{ route('kontak.destroy', $k->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr class="my-5">

                <h3><i class="bi bi-share"></i> Media Sosial</h3>
                <p>Kelola link media sosial organisasi.</p>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('kontak.updateSosial') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Facebook</h5>
                            <div class="mb-3">
                                <label for="facebook_url" class="form-label">URL</label>
                                <input type="url" class="form-control" id="facebook_url" name="facebook_url"
                                    value="{{ $sosialMedia->get('facebook')->url ?? '' }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="facebook_aktif" name="facebook_aktif"
                                    value="1" {{ $sosialMedia->get('facebook')->aktif ?? false ? 'checked' : '' }}>
                                <label class="form-check-label" for="facebook_aktif">Aktif</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Instagram</h5>
                            <div class="mb-3">
                                <label for="instagram_url" class="form-label">URL</label>
                                <input type="url" class="form-control" id="instagram_url" name="instagram_url"
                                    value="{{ $sosialMedia->get('instagram')->url ?? '' }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="instagram_aktif" name="instagram_aktif"
                                    value="1" {{ $sosialMedia->get('instagram')->aktif ?? false ? 'checked' : '' }}>
                                <label class="form-check-label" for="instagram_aktif">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Twitter</h5>
                            <div class="mb-3">
                                <label for="twitter_url" class="form-label">URL</label>
                                <input type="url" class="form-control" id="twitter_url" name="twitter_url"
                                    value="{{ $sosialMedia->get('twitter')->url ?? '' }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="twitter_aktif" name="twitter_aktif"
                                    value="1" {{ $sosialMedia->get('twitter')->aktif ?? false ? 'checked' : '' }}>
                                <label class="form-check-label" for="twitter_aktif">Aktif</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>LinkedIn</h5>
                            <div class="mb-3">
                                <label for="linkedin_url" class="form-label">URL</label>
                                <input type="url" class="form-control" id="linkedin_url" name="linkedin_url"
                                    value="{{ $sosialMedia->get('linkedin')->url ?? '' }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="linkedin_aktif" name="linkedin_aktif"
                                    value="1" {{ $sosialMedia->get('linkedin')->aktif ?? false ? 'checked' : '' }}>
                                <label class="form-check-label" for="linkedin_aktif">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>YouTube</h5>
                            <div class="mb-3">
                                <label for="youtube_url" class="form-label">URL</label>
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url"
                                    value="{{ $sosialMedia->get('youtube')->url ?? '' }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="youtube_aktif" name="youtube_aktif"
                                    value="1" {{ $sosialMedia->get('youtube')->aktif ?? false ? 'checked' : '' }}>
                                <label class="form-check-label" for="youtube_aktif">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                </form>
            </div>
        @endsection


        @section('scripts')
            <script>
                $(document).ready(function() {
                    $('#kontakTable').DataTable({
                        responsive: true,
                        language: {
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Cari:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir"
                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>
        @endsection
