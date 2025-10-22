@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-envelope-open"></i> Detail Pesan</h3>
        <hr>

        <div class="card p-3 shadow-sm">
            <h5>Nama: {{ $pesan->nama }}</h5>
            <p>Email: {{ $pesan->email }}</p>
            <p><strong>Tanggal:</strong> {{ $pesan->tanggal }}</p>
            <hr>
            <p><strong>Pesan:</strong></p>
            <p>{{ $pesan->pesan }}</p>
            @if ($pesan->reply)
                <hr>
                <p><strong>Balasan:</strong></p>
                <p>{{ $pesan->reply }}</p>
                <p><strong>Dibalas pada:</strong> {{ $pesan->replied_at ? $pesan->replied_at->format('d M Y H:i') : '-' }}
                </p>
            @endif
        </div>

        <div class="mt-3">
            <a href="{{ route('kontak.reply', $pesan->id) }}" class="btn btn-primary">Balas</a>
            <a href="{{ route('kontak.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
