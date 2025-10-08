@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-eye"></i> Detail Rapat</h3>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $rapat->judul }}</h5>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->tanggal)->format('d M Y') }}</p>
                <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>
                <p><strong>Keterangan:</strong><br> {{ $rapat->keterangan }}</p>
            </div>
        </div>

        <a href="{{ route('rapat.index') }}" class="btn btn-secondary mt-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
@endsection
