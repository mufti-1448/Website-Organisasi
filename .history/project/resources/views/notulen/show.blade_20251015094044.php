@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-file-earmark-text"></i> Detail Notulen</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Rapat:</strong> {{ $notulen->rapat->nama ?? '-' }}</p>
            <p><strong>Program Kerja:</strong> {{ $notulen->programKerja->nama ?? '-' }}</p>
            <p><strong>Penulis:</strong> {{ $notulen->penulis->nama ?? '-' }}</p>
            <p><strong>Tanggal:</strong> {{ $notulen->tanggal }}</p>

            <p><strong>Isi Notulen:</strong></p>
            <div class="border p-3 bg-light">{!! nl2br(e($notulen->isi ?? '-')) !!}</div>

            <p class="mt-3"><strong>File Notulen:</strong></p>
            @if($notulen->file_path)
                <a href="{{ asset('storage/'.$notulen->file_path) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-download"></i> Unduh File
                </a>
            @else
                <span class="text-muted">Tidak ada file</span>
            @endif

            <div class="mt-4">
                <a href="{{ route('notulen.edit', $notulen->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
