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

        <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Tempat</th>
            <th>Status</th>
            <th>Jumlah Peserta</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rapat as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->judul }}</td>
                <td>{{ $r->tanggal }}</td>
                <td>{{ $r->tempat }}</td>
                <td>
                    @if ($r->status == 'belum')
                        <span class="badge bg-secondary">Belum Dimulai</span>
                    @elseif ($r->status == 'berlangsung')
                        <span class="badge bg-warning text-dark">Sedang Berlangsung</span>
                    @else
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </td>
                <td>{{ $r->jumlah_peserta ?? '-' }}</td>
                <td>
                    <a href="{{ route('rapat.show', $r->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('rapat.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
@endsection
