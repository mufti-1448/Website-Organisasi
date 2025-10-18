@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-images"></i> Daftar Dokumentasi</h3>

    <a href="{{ route('dokumentasi.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Dokumentasi
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
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
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->kategori ?? '-' }}</td>
                    <td>{{ Str::limit($item->deskripsi, 50) ?? '-' }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" width="80" class="rounded shadow-sm">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('dokumentasi.show', $item->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('dokumentasi.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('dokumentasi.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumentasi ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada dokumentasi.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
