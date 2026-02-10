@extends('admin.layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<style>
    
</style>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Anggota</h1>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Anggota
        </a>
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

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="bi bi-people-fill me-2"></i>Daftar Anggota Organisasi
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle" id="anggotaTable"
                    style="border-radius: 0.375rem; overflow: hidden;">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">#</th>
                            <th><i class="bi bi-person-circle me-1"></i>Nama</th>
                            <th><i class="bi bi-mortarboard-fill me-1"></i>Kelas</th>
                            <th><i class="bi bi-award me-1"></i>Jabatan</th>
                            <th><i class="bi bi-telephone me-1"></i>Kontak</th>
                            <th class="text-center"><i class="bi bi-camera me-1"></i>Foto</th>
                            <th class="text-center"><i class="bi bi-gear me-1"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggota as $item)
                            <tr>
                                <td class="text-center fw-bold">{{ $item->id }}</td>
                                <td class="fw-semibold">{{ $item->nama }}</td>
                                <td><span class="badge bg-secondary">{{ $item->kelas }}</span></td>
                                <td>
                                    <span
                                        class="badge bg-{{ $item->jabatan == 'Ketua' ? 'success' : ($item->jabatan == 'Wakil Ketua' ? 'info' : 'warning') }}">
                                        {{ $item->jabatan }}
                                    </span>
                                </td>
                                <td>{{ $item->kontak }}</td>
                                <td class="text-center">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}"
                                            alt="Foto {{ $item->nama }}" class="rounded-circle"
                                            style="width: 40px; height: 40px; object-fit: cover; border: 2px solid #dee2e6;">
                                    @else
                                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; border: 2px solid #dee2e6;">
                                            <i class="bi bi-person text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                            data-bs-target="#showModal{{ $item->id }}" title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a href="{{ route('anggota.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-info-circle fs-1 d-block mb-2"></i>
                                        Belum ada data anggota.
                                    </div>
                                </td>
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
