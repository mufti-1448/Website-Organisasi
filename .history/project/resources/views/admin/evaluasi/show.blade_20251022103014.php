@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-eye"></i> Detail Evaluasi</h3>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $evaluasi->judul }}</h5>

                <p><strong>Program Kerja:</strong> {{ $evaluasi->programKerja->nama ?? '-' }}</p>
                <p><strong>Tanggal:</strong> {{ $evaluasi->tanggal }}</p>
                <p><strong>Penulis:</strong> {{ $evaluasi->penulis }}</p>

                <p><strong>Isi Evaluasi:</strong><br>
                    {{ $evaluasi->isi }}
                </p>

                <p><strong>File:</strong></p>
                @if ($evaluasi->file)
                    <a href="{{ asset('storage/' . $evaluasi->file) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-download"></i> Lihat File
                    </a>
                @else
                    <span class="text-muted">Tidak ada file</span>
                @endif

                <hr>
                <div class="d-flex gap-1">
                    <a href="{{ route('evaluasi.edit', $evaluasi->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
