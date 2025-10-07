@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-people-fill me-2"></i> Daftar Anggota</h2>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Anggota
    </a>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($anggota as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->jabatan }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->no_hp }}</td>
                <td class="text-center">
                    <a href="{{ route('anggota.show', $a->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data anggota.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
