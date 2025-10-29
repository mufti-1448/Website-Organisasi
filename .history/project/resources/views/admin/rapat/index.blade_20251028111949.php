@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-3"><i class="bi bi-calendar-event"></i> Daftar Rapat</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('rapat.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Rapat</a>

        <table class="table table-striped table-bordered" id="rapatTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rapat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"
                                onclick="viewRapat('{{ $item->id }}')"><i class="bi bi-eye"></i></button>
                            <a href="{{ route('rapat.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('rapat.destroy', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
