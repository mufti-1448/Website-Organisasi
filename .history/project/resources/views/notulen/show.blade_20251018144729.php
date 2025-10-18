@extends('layouts.app')

@section('title', 'Detail Notulen')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Detail Notulen</h1>
        <div>
            <a href="{{ route('notulen.edit', $notulen->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('notulen.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <dl class="row">
                        <dt class="col-sm-3">ID Notulen</dt>
                        <dd class="col-sm-9">{{ $notulen->id }}</dd>

                        <dt class="col-sm-3">Judul</dt>
                        <dd class="col-sm-9">{{ $notulen->judul }}</dd>

                        <dt class="col-sm-3">Rapat</dt>
                        <dd class="col-sm-9">{{ $notulen->rapat->judul ?? '-' }}</dd>

                        <dt class="col-sm-3">Penulis</dt>
                        <dd class="col-sm-9">{{ $notulen->penulis->nama ?? '-' }}</dd>

                        <dt class="col-sm-3">Tanggal</dt>
                        <dd class="col-sm-9">{{ $notulen->tanggal }}</dd>

                        <dt class="col-sm-3">Isi Notulen</dt>
                        <dd class="col-sm-9">
                            <div class="border p-3 bg-light">{!! nl2br(e($notulen->isi)) !!}</div>
                        </dd>

                        <dt class="col-sm-3">File Notulen</dt>
                        <dd class="col-sm-9">
                            @if($notulen->file_path)
                                <a href="{{ asset('storage/'.$notulen->file_path) }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="bi bi-download"></i> Unduh File
                                </a>
                            @else
                                <span class="text-muted">Tidak ada file</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3">Dibuat</dt>
                        <dd class="col-sm-9">
                            {{ $notulen->created_at ? $notulen->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}</dd>

                        <dt class="col-sm-3">Diupdate</dt>
                        <dd class="col-sm-9">
                            {{ $notulen->updated_at ? $notulen->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
