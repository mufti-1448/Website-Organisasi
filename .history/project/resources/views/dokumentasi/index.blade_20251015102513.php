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
                <th>Judul</th>
                <th>Rapat</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dokumentasis as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->rapat->judul ?? '-' }}</td>
                    <td>{{ $item->kategori ?? '-' }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->foto) }}" width="80" class="rounded shadow-sm">
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
                <tr><td colspan="6" class="text-center">Belum ada dokumentasi.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
