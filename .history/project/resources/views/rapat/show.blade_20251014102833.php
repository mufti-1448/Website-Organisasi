@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-info-circle"></i> Detail Rapat</h3>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>ID Rapat:</strong> {{ $rapat->id }}</p>
                <p><strong>Judul:</strong> {{ $rapat->judul }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->tanggal)->format('d-m-Y') }}</p>
                <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>
                <p><strong>Keterangan:</strong> {{ $rapat->keterangan }}</p>
            </div>
        </div>

        {{-- Relasi Notulen --}}
        @if ($rapat->notulen)
            <h5><i class="bi bi-journal-text"></i> Notulen Rapat</h5>
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Tanggal:</strong> {{ $rapat->notulen->tanggal }}</p>
                    <p><strong>Isi:</strong> {{ $rapat->notulen->isi }}</p>
                    <p><strong>Penulis:</strong> {{ $rapat->notulen->penulis->nama ?? '-' }}</p>
                </div>
            </div>
        @endif

        {{-- Relasi Dokumentasi --}}
        @if ($rapat->dokumentasi->count() > 0)
            <h5><i class="bi bi-images"></i> Dokumentasi Rapat</h5>
            <div class="row">
                @foreach ($rapat->dokumentasi as $foto)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('images/' . $foto->foto) }}" class="card-img-top" alt="{{ $foto->judul }}">
                            <div class="card-body">
                                <h6>{{ $foto->judul }}</h6>
                                <p class="text-muted">{{ $foto->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('rapat.index') }}" class="btn btn-secondary mt-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
@endsection
