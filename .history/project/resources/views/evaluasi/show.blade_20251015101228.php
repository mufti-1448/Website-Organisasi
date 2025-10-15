@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-eye"></i> Detail Evaluasi</h3>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h5 class="card-title">Program: {{ $evaluasi->program->nama ?? '-' }}</h5>

            <p><strong>Tanggal:</strong> {{ $evaluasi->tanggal }}</p>
            <p><strong>Status:</strong>
                <span class="badge
                    @if($evaluasi->status == 'selesai') bg-success
                    @elseif($evaluasi->status == 'revisi') bg-warning
                    @else bg-secondary @endif">
                    {{ ucfirst($evaluasi->status) }}
                </span>
            </p>

            <p><strong>Catatan:</strong><br>
                {{ $evaluasi->catatan ?? 'Tidak ada catatan.' }}
            </p>

            <p><strong>File:</strong></p>
            @if($evaluasi->file_path)
                <a href="{{ asset('storage/'.$evaluasi->file_path) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-download"></i> Lihat File
                </a>
            @else
                <span class="text-muted">Tidak ada file</span>
            @endif

            <hr>
            <a href="{{ route('evaluasi.edit', $evaluasi->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
