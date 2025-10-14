@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-eye"></i> Detail Rapat</h3>

    <ul class="nav nav-tabs mt-3" id="rapatTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab">Detail</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="notulen-tab" data-bs-toggle="tab" data-bs-target="#notulen" type="button" role="tab">Notulen</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="dokumentasi-tab" data-bs-toggle="tab" data-bs-target="#dokumentasi" type="button" role="tab">Dokumentasi</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="rapatTabContent">
        <!-- Detail -->
        <div class="tab-pane fade show active" id="detail" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $rapat->judul }}</h5>
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->tanggal)->format('d M Y') }}</p>
                    <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>
                    <p><strong>Status:</strong> {{ $rapat->status }}</p>
                </div>
            </div>
        </div>

        <!-- Notulen -->
        <div class="tab-pane fade" id="notulen" role="tabpanel">
            @if($rapat->notulen)
            <div class="card">
                <div class="card-body">
                    <p><strong>Penulis:</strong> {{ $rapat->notulen->penulis->nama }}</p>
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->notulen->tanggal)->format('d M Y') }}</p>
                    <p><strong>Isi Notulen:</strong></p>
                    <p>{{ $rapat->notulen->isi }}</p>
                </div>
            </div>
            @else
            <p class="text-muted">Belum ada notulen.</p>
            @endif
        </div>

        <!-- Dokumentasi -->
        <div class="tab-pane fade" id="dokumentasi" role="tabpanel">
            @if($rapat->dokumentasi->count())
            <div class="row">
                @foreach($rapat->dokumentasi as $dok)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/'.$dok->foto) }}" class="card-img-top" alt="Foto">
                        <div class="card-body">
                            <h6>{{ $dok->judul ?? '-' }}</h6>
                            <p class="mb-0">{{ $dok->deskripsi ?? '-' }}</p>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($dok->tanggal)->format('d M Y') }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-muted">Belum ada dokumentasi.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('rapat.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>
@endsection
