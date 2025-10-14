@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Rapat: {{ $rapat->judul }}</h2>

    <table class="table">
        <tr><th>ID</th><td>{{ $rapat->id }}</td></tr>
        <tr><th>Judul</th><td>{{ $rapat->judul }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $rapat->tanggal }}</td></tr>
        <tr><th>Tempat</th><td>{{ $rapat->tempat }}</td></tr>
        <tr><th>Status</th><td>{{ ucfirst($rapat->status) }}</td></tr>
        <tr><th>Jumlah Peserta</th><td>{{ $rapat->jumlah_peserta ?? '-' }}</td></tr>
    </table>

    <hr>

    <h5>📄 Notulen</h5>
    @if ($rapat->notulen && $rapat->notulen->file_path)
        <a href="{{ asset('storage/' . $rapat->notulen->file_path) }}" target="_blank" class="btn btn-outline-primary">Lihat / Unduh Notulen</a>
    @else
        <p><i>Belum ada notulen.</i></p>
    @endif

    <h5 class="mt-4">🖼️ Dokumentasi</h5>
    @if ($rapat->dokumentasi->count() > 0)
        <div class="row">
            @foreach ($rapat->dokumentasi as $doc)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('storage/' . $doc->file_path) }}" class="img-fluid rounded shadow-sm">
                </div>
            @endforeach
        </div>
    @else
        <p><i>Belum ada dokumentasi.</i></p>
    @endif

    <a href="{{ route('rapat.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
