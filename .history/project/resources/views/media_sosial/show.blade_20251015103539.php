@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-share"></i> Detail Media Sosial</h3>

    <div class="card">
        <div class="card-body">
            <h5>{{ $mediaSosial->nama_platform }}</h5>
            <p><strong>URL:</strong> <a href="{{ $mediaSosial->url }}" target="_blank">{{ $mediaSosial->url }}</a></p>
            <p><strong>Icon:</strong>
                @if($mediaSosial->icon)
                    <i class="bi {{ $mediaSosial->icon }}"></i> {{ $mediaSosial->icon }}
                @else
                    Tidak ada
                @endif
            </p>
            <p><strong>Status:</strong>
                @if($mediaSosial->aktif)
                    <span class="badge bg-success">Aktif</span>
                @else
                    <span class="badge bg-secondary">Tidak Aktif</span>
                @endif
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('media_sosial.edit', $mediaSosial->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('media_sosial.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
