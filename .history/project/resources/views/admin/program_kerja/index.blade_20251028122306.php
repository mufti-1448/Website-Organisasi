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
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Penanggung Jawab</th>
                    <th>Target Date</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programKerja as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->penanggungJawab->nama ?? '-' }}</td>
                        <td>{{ $p->target_date ? \Carbon\Carbon::parse($p->target_date)->format('d-m-Y') : '-' }}</td>
                        <td><span class="badge bg-info text-dark">{{ ucfirst($p->status) }}</span></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $p->id }}">Lihat</button>
                            <a href="{{ route('program_kerja.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('program_kerja.destroy', $p->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus program ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal untuk setiap program kerja -->
        @foreach ($programKerja as $p)
            <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1"
                aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $p->id }}">Detail Program Kerja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card p-3">
                                <p><strong>ID:</strong> {{ $p->id }}</p>
                                <p><strong>Nama:</strong> {{ $p->nama }}</p>
                                <p><strong>Deskripsi:</strong> {{ $p->deskripsi ?? '-' }}</p>
                                <p><strong>Penanggung Jawab:</strong> {{ $p->penanggungJawab->nama ?? '-' }}</p>
                                <p><strong>Target Date:</strong>
                                    {{ $p->target_date ? \Carbon\Carbon::parse($p->target_date)->format('d-m-Y') : '-' }}
                                </p>
                                <p><strong>Status:</strong> <span
                                        class="badge bg-info text-dark">{{ ucfirst($p->status) }}</span></p>
                            </div>

                            <hr>
                            <h5>Notulen:</h5>
                            @forelse ($p->notulen as $n)
                                <p><a href="{{ asset('storage/' . $n->file_path) }}" target="_blank">📄 Lihat Notulen</a>
                                </p>
                            @empty
                                <p>- Belum ada notulen -</p>
                            @endforelse

                            <h5>Dokumentasi:</h5>
                            @forelse ($p->dokumentasi as $d)
                                @if ($d->foto)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $d->foto) }}" alt="Dokumentasi" class="img-fluid"
                                            style="max-width: 100px;">
                                        <p><small>{{ $d->judul }}</small></p>
                                    </div>
                                @else
                                    <p>- Tidak ada gambar -</p>
                                @endif
                            @empty
                                <p>- Belum ada dokumentasi -</p>
                            @endforelse

                            <h5>Evaluasi:</h5>
                            @forelse ($p->evaluasi as $e)
                                <p><a href="{{ asset('storage/' . $e->file) }}" target="_blank">📄 Lihat File Evaluasi</a>
                                </p>
                            @empty
                                <p>- Belum ada evaluasi -</p>
                            @endforelse
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
            $('#program-kerjaTable').DataTable({
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
