@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Program Kerja</h2>

        <a href="{{ route('programkerja.create') }}" class="btn btn-primary mb-3">Tambah Program</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Program</th>
                    <th>Penanggung Jawab</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programKerja as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_program }}</td>
                        <td>{{ $item->penanggung_jawab }}</td>
                        <td>{{ $item->tanggal_pelaksanaan }}</td>
                        <td class="text-truncate-cell">{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('program_kerja.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('programkerja.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .text-truncate-cell {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 250px;
        }
    </style>
@endsection
