@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        {{-- Judul --}}
        <h3 class="mb-4">
            <i class="bi bi-calendar3 me-2"></i> Detail Rapat
        </h3>

        {{-- Informasi Rapat --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-capitalize">{{ $rapat->judul }}</h4>
                <p><strong>Tanggal:</strong> {{ $rapat->tanggal }}</p>
                <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>

                <p><strong>Status Rapat:</strong>
                    @if ($rapat->status == 'belum')
                        <span class="badge bg-secondary">Belum Dimulai</span>
                    @elseif ($rapat->status == 'berlangsung')
                        <span class="badge bg-warning text-dark">Sedang Berlangsung</span>
                    @elseif ($rapat->status == 'selesai')
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </p>

                <p><strong>Jumlah Peserta:</strong> {{ $rapat->jumlah_peserta ?? '-' }}</p>
            </div>
        </div>


        {{-- Notulen --}}
        @if ($rapat->notulen)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5><i class="bi bi-journal-text me-2"></i> Notulen Rapat</h5>
                    <p><strong>ID Notulen:</strong> {{ $rapat->notulen->id }}</p>
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->notulen->tanggal)->format('d F Y') }}</p>
                    <p><strong>Isi Notulen:</strong></p>
                    <div class="border rounded p-3 bg-light mb-2">
                        {{ $rapat->notulen->isi }}
                    </div>
                    <p><strong>Penulis:</strong> {{ $rapat->notulen->penulis->nama ?? '-' }}</p>

                    <a href="{{ route('notulen.edit', $rapat->notulen->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit Notulen
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Belum ada notulen untuk rapat ini.
                <a href="{{ route('notulen.create', ['rapat_id' => $rapat->id]) }}" class="btn btn-sm btn-primary ms-2">
                    Tambah Notulen
                </a>
            </div>
        @endif

        {{-- Dokumentasi --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <h5><i class="bi bi-images me-2"></i> Dokumentasi Rapat</h5>
                @if ($rapat->dokumentasi->isNotEmpty())
                    <div class="row mt-3">
                        @foreach ($rapat->dokumentasi as $foto)
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('storage/' . $foto->path) }}" class="card-img-top" alt="Foto Rapat">
                                    <div class="card-body text-center p-2">
                                        <small class="text-muted">{{ $foto->keterangan ?? 'Tanpa keterangan' }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Belum ada dokumentasi rapat ini.</p>
                    <a href="{{ route('dokumentasi.create', ['rapat_id' => $rapat->id]) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-upload"></i> Tambah Dokumentasi
                    </a>
                @endif
            </div>
        </div>

    </div>
@endsection
