@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-journal-text"></i> Daftar Notulen</h3>

    <a href="{{ route('notulen.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Notulen
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Rapat</th>
                <th>Program Kerja</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notulens as $not)
                <tr>
                    <td>{{ $not->id }}</td>
                    <td>{{ $not->rapat->judul ?? '—' }}</td>
                    <td>{{ $not->programKerja->nama_program ?? '—' }}</td>
                    <td>{{ $not->penulis->nama ?? '—' }}</td>
                    <td>{{ \Carbon\Carbon::parse($not->tanggal)->format('d/m/Y') }}</td>
                    <td>
                        @if ($not->file_path)
                            <a href="{{ asset('storage/' . $not->file_path) }}" target="_blank">📄 Lihat File</a>
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('notulen.show', $not->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('notulen.edit', $not->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('notulen.destroy', $not->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus notulen ini?')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada notulen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
