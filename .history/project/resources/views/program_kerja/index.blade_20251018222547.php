@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-list-task"></i> Daftar Program Kerja</h3>

    <a href="{{ route('program_kerja.create') }}" class="btn btn-primary mb-3">+ Tambah Program</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Penanggung Jawab</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programKerja as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->penanggungJawab->nama ?? '-' }}</td>
                <td><span class="badge bg-info text-dark">{{ ucfirst($p->status) }}</span></td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $p->id }}">Lihat</button>
                    <a href="{{ route('program_kerja.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('program_kerja.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus program ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
