@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-eye"></i> Detail Program Kerja</h3>

        <div class="card p-3">
            <p><strong>ID:</strong> {{ $program->id }}</p>
            <p><strong>Nama:</strong> {{ $program->nama }}</p>
            <p><strong>Deskripsi:</strong> {{ $program->deskripsi ?? '-' }}</p>
            <p><strong>Penanggung Jawab:</strong> {{ $program->penanggungJawab->nama ?? '-' }}</p>
            <p><strong>Status:</strong> <span class="badge bg-info text-dark">{{ ucfirst($program->status) }}</span></p>
        </div>

        <hr>
        <h5>Notulen:</h5>
        @forelse ($program->notulen as $n)
            <p><a href="{{ asset('storage/' . $n->file_path) }}" target="_blank">📄 Lihat Notulen</a></p>
        @empty
            <p>- Belum ada notulen -</p>
        @endforelse

        <h5>Dokumentasi:</h5>
        <div class="row">
            @forelse ($program->dokumentasi as $d)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('storage/' . $d->foto) }}" class="img-fluid rounded">
                </div>
            @empty
                <p>- Belum ada dokumentasi -</p>
            @endforelse
        </div>

        <h5>Evaluasi:</h5>
        @forelse ($program->evaluasi as $e)
            <p><a href="{{ asset('storage/' . $e->file_path) }}" target="_blank">📄 Lihat File Evaluasi</a></p>
        @empty
            <p>- Belum ada evaluasi -</p>
        @endforelse

        <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
