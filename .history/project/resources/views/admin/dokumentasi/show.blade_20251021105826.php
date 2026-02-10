@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-image"></i> Detail Dokumentasi</h3>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h4>{{ $dokumentasi->judul }}</h4>
            <p><strong>Tanggal:</strong> {{ $dokumentasi->tanggal }}</p>
            <p><strong>Kategori:</strong> {{ $dokumentasi->kategori ?? '-' }}</p>
            <p><strong>Deskripsi:</strong><br>{{ $dokumentasi->deskripsi ?? '-' }}</p>

            @if($dokumentasi->foto)
                <div class="mt-3">
                    <img src="{{ asset('storage/dokumentasi/' . $dokumentasi->foto) }}" class="img-fluid rounded shadow" alt="Foto Dokumentasi">
                </div>
            @endif

            <hr>
            <a href="{{ route('dokumentasi.edit', $dokumentasi->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
