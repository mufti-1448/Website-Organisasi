@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4"><i class="bi bi-calendar-event"></i> Detail Rapat</h3>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="fw-bold">{{ $rapat->judul }}</h4>
            <p><strong>Tanggal:</strong> {{ $rapat->tanggal }}</p>
            <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>
            <p><strong>Status Rapat:</strong>
                <span class="badge
                    @if($rapat->keterangan == 'Belum Dimulai') bg-secondary
                    @elseif($rapat->keterangan == 'Sedang Berlangsung') bg-warning text-dark
                    @elseif($rapat->keterangan == 'Selesai') bg-success
                    @endif">
                    {{ $rapat->keterangan }}
                </span>
            </p>
            <p><strong>Jumlah Peserta:</strong> {{ $rapat->jumlah_peserta ?? '-' }}</p>
        </div>
    </div>

    {{-- Relasi Notulen --}}
    @if ($rapat->notulen->isNotEmpty())
        <h5><i class="bi bi-journal-text"></i> Notulen Rapat</h5>
        @foreach ($rapat->notulen as $notulen)
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>ID Notulen:</strong> {{ $notulen->id }}</p>
                    <p><strong>Tanggal:</strong> {{ $notulen->tanggal }}</p>
                    <p><strong>Isi:</strong> {{ $notulen->isi }}</p>
                    <p><strong>Penulis:</strong> {{ $notulen->penulis->nama ?? '-' }}</p>
                </div>
            </div>
        @endforeach
    @endif

    {{-- Relasi Dokumentasi --}}
    @if ($rapat->dokumentasi->isNotEmpty())
        <h5><i class="bi bi-images"></i> Dokumentasi Rapat</h5>
        <div class="row">
            @foreach ($rapat->dokumentasi as $doc)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($doc->foto)
                            <img src="{{ asset('storage/' . $doc->foto) }}" class="card-img-top" alt="Foto Dokumentasi">
                        @endif
                        <div class="card-body">
                            <h6>{{ $doc->judul }}</h6>
                            <p>{{ $doc->deskripsi }}</p>
                            <small class="text-muted">Tanggal: {{ $doc->tanggal }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
