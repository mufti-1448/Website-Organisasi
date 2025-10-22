@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-journal-text"></i> Daftar Notulen</h3>

    <a href="{{ route('notulen.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Notulen
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Rapat</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>File</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notulen as $n)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->judul }}</td>
                            <td>{{ $n->rapat->judul ?? '-' }}</td>
                            <td>{{ $n->penulis->nama ?? '-' }}</td>
                            <td>{{ $n->tanggal }}</td>
                            <td>
                                @if($n->file_path)
                                    <a href="{{ asset('storage/'.$n->file_path) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Lihat
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $n->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <a href="{{ route('notulen.edit', $n->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('notulen.destroy', $n->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus notulen ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data notulen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal untuk menampilkan detail notulen -->
    @foreach($notulen as $n)
    <div class="modal fade" id="showModal{{ $n->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $n->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel{{ $n->id }}">Detail Notulen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3">ID Notulen</dt>
                                <dd class="col-sm-9">{{ $n->id }}</dd>

                                <dt class="col-sm-3">Judul</dt>
                                <dd class="col-sm-9">{{ $n->judul }}</dd>

                                <dt class="col-sm-3">Rapat</dt>
                                <dd class="col-sm-9">{{ $n->rapat->judul ?? '-' }}</dd>

                                <dt class="col-sm-3">Penulis</dt>
                                <dd class="col-sm-9">{{ $n->penulis->nama ?? '-' }}</dd>

                                <dt class="col-sm-3">Tanggal</dt>
                                <dd class="col-sm-9">{{ $n->tanggal }}</dd>

                                <dt class="col-sm-3">Isi Notulen</dt>
                                <dd class="col-sm-9">
                                    <div class="border p-3 bg-light">{!! nl2br(e($n->isi)) !!}</div>
                                </dd>

                                <dt class="col-sm-3">File Notulen</dt>
                                <dd class="col-sm-9">
                                    @if($n->file_path)
                                        <a href="{{ asset('storage/'.$n->file_path) }}" target="_blank" class="btn btn-outline-primary">
                                            <i class="bi bi-download"></i> Unduh File
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada file</span>
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Dibuat</dt>
                                <dd class="col-sm-9">
                                    {{ $n->created_at ? $n->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}</dd>

                                <dt class="col-sm-3">Diupdate</dt>
                                <dd class="col-sm-9">
                                    {{ $n->updated_at ? $n->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="{{ route('notulen.edit', $n->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
