@extends('admin.layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <div class="row mb-2">
        <div class="col-6">
            <h3 class="mb-0">Data Anggota</h3>
            <p class="text-muted">Ringkasan informasi anggota</p>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('anggota.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Anggota
            </a>

        </div>
    </div>

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

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="anggotaTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jabatan</th>
                            <th>Kontak</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggota as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->kontak }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}"
                                            alt="Foto {{ $item->nama }}" class="img-thumbnail"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $item->id }}">
                                        <i class="bi bi-eye"></i> Lihat
                                    </button>
                                    <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data anggota.</td>
                            </tr>
                        @endforelse
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
