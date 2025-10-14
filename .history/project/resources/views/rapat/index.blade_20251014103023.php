@extends('layouts.app')

@section('content')
    <style>
        .text-truncate-cell {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 250px;
        }
    </style>

    <div class="container mt-4">
        <h3 class="mb-3"><i class="bi bi-calendar-event"></i> Daftar Rapat</h3>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('rapat.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Rapat
            </a>
        </div>

        <table class="table table-striped table-bordered align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rapat as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td class="text-truncate-cell">{{ $item->status }}</td>
                        <td class="text-center">
                            <a href="{{ route('rapat.show', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('rapat.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('rapat.destroy', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus rapat ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data rapat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
