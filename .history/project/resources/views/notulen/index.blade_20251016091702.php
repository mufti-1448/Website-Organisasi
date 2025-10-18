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
                            <td>{{ $n->judul }}</td>
                            <td>{{ $n->rapat->nama ?? '-' }}</td>
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
                                <a href="{{ route('notulen.show', $n->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data notulen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
