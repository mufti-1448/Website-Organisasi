@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-eye"></i> Detail Rapat</h3>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $rapat->judul }}</h5>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->tanggal)->format('d M Y') }}</p>
            <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>
            <p><strong>Status:</strong> {{ $rapat->status }}</p>
        </div>
    </div>

    <!-- Tabs Notulen & Dokumentasi -->
    <ul class="nav nav-tabs" id="rapatTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="notulen-tab" data-bs-toggle="tab" data-bs-target="#notulen" type="button" role="tab">Notulen</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="dokumentasi-tab" data-bs-toggle="tab" data-bs-target="#dokumentasi" type="button" role="tab">Dokumentasi</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="rapatTabContent">
        <!-- Notulen Tab -->
        <div class="tab-pane fade show active" id="notulen" role="tabpanel">
            @if($rapat->notulen)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Isi Notulen</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $rapat->notulen->isi }}</td>
                            <td>{{ \Carbon\Carbon::parse($rapat->notulen->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $rapat->notulen->penulis->nama ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p class="text-muted">Belum ada notulen untuk rapat ini.</p>
            @endif
        </div>

        <!-- Dokumentasi Tab -->
        <div class="tab-pane fade" id="dokumentasi" role="tabpanel">
            @if($rapat->dokumentasi->count() > 0)
                <div class="row">
                    @foreach($rapat->dokumentasi as $doc)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $doc->foto) }}" class="card-img-top" alt="{{ $doc->judul }}">
                            <div class="card-body">
                                <h6 class="card-title">{{ $doc->judul }}</h6>
                                <p class="card-text">{{ $doc->deskripsi }}</p>
                                <p class="text-muted mb-0">Tanggal: {{ \Carbon\Carbon::parse($doc->tanggal)->format('d-m-Y') }}</p>
                                <p class="text-muted mb-0">Kategori: {{ $doc->kategori ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">Belum ada dokumentasi untuk rapat ini.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('rapat.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>
@endsection
