@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-file-earmark-text"></i> Detail Notulen</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $notulen->id }}</p>
            <p><strong>Rapat:</strong> {{ $notulen->rapat->judul ?? '—' }}</p>
            <p><strong>Program Kerja:</strong> {{ $notulen->programKerja->nama_program ?? '—' }}</p>
            <p><strong>Penulis:</strong> {{ $notulen->penulis->nama ?? '—' }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($notulen->tanggal)->format('d/m/Y') }}</p>
            <p><strong>Isi Notulen:</strong></p>
            <p class="border p-2 bg-light">{!! nl2br(e($notulen->isi)) !!}</p>

            @if ($notulen->file_path)
                <p><strong>File Lampiran:</strong>
                    <a href="{{ asset('storage/' . $notulen->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        📄 Lihat File
                    </a>
                </p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('notulen.index') }}" class="btn btn-secondary">← Kembali</a>
        <a href="{{ route('notulen.edit', $notulen->id) }}" class="btn btn-warning">✏️ Edit</a>
    </div>
</div>
@endsection
