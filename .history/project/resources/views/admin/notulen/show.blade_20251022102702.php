i
@extends('admin.layouts.app')
esal@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-eye"></i> Detail Notulen</h3>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $notulen->judul }}</h5>
                <p><strong>ID:</strong> {{ $notulen->id }}</p>
                <p><strong>Rapat:</strong> {{ $notulen->rapat->judul ?? '-' }}</p>
                <p><strong>Penulis:</strong> {{ $notulen->penulis->nama ?? '-' }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($notulen->tanggal)->format('d M Y') }}</p>
            </div>
        </div>

        <!-- Isi Notulen -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Isi Notulen</h6>
            </div>
            <div class="card-body">
                <div class="border p-3 bg-light">{!! nl2br(e($notulen->isi)) !!}</div>
            </div>
        </div>

        <!-- File Notulen -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">File Notulen</h6>
            </div>
            <div class="card-body">
                @if ($notulen->file_path)
                    <a href="{{ asset('storage/' . $notulen->file_path) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-download"></i> Unduh File
                    </a>
                @else
                    <span class="text-muted">Tidak ada file</span>
                @endif
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('notulen.edit', $notulen->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('notulen.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@endsection
