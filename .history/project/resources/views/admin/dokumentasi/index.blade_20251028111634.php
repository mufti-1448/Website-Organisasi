@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-images"></i> Daftar Dokumentasi</h3>

        <a href="{{ route('dokumentasi.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Dokumentasi
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dokumentasis as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->kategori ?? '-' }}</td>
                        <td>{{ Str::limit($item->deskripsi, 50) ?? '-' }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" width="80" class="rounded shadow-sm">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $item->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('dokumentasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('dokumentasi.destroy', $item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus dokumentasi ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modals for each dokumentasi -->
        @foreach ($dokumentasis as $item)
            <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="showModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showModalLabel{{ $item->id }}">Detail Dokumentasi -
                                {{ $item->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Judul:</strong> {{ $item->judul }}</p>
                            <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                            <p><strong>Kategori:</strong> {{ $item->kategori ?? '-' }}</p>
                            <p><strong>Deskripsi:</strong><br>{{ $item->deskripsi ?? '-' }}</p>
                            <p><strong>Foto:</strong></p>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded shadow-sm"
                                    alt="Foto Dokumentasi" style="max-width: 400px; max-height: 300px;">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
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
            $('#anggotaTable').DataTable({
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
