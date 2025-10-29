@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-clipboard-check"></i> Daftar Evaluasi</h3>
        <a href="{{ route('evaluasi.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Tambah Evaluasi
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Nama Program Kerja</th>
                    <th>Tanggal</th>
                    <th>Penulis</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluasi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->programKerja->nama ?? '-' }}</td>
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
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $item->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('evaluasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('evaluasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
