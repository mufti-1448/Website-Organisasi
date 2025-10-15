@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-envelope"></i> Pesan Masuk</h3>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontak as $k)
            <tr>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>
                    <span class="badge {{ $k->status === 'baru' ? 'bg-warning' : 'bg-success' }}">
                        {{ ucfirst($k->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('kontak.show', $k->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="{{ route('kontak.reply', $k->id) }}" class="btn btn-sm btn-primary">Balas</a>
                    <form action="{{ route('kontak.destroy', $k->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pesan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
