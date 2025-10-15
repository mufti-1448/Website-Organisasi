@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-share"></i> Edit Media Sosial</h3>

    <form action="{{ route('media_sosial.update', $mediaSosial->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_platform" class="form-label">Nama Platform</label>
            <input type="text" name="nama_platform" id="nama_platform" class="form-control" value="{{ $mediaSosial->nama_platform }}" required>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ $mediaSosial->url }}" required>
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon (Bootstrap Icon Class)</label>
            <input type="text" name="icon" id="icon" class="form-control" value="{{ $mediaSosial->icon }}" placeholder="bi-facebook">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="aktif" id="aktif" class="form-check-input" {{ $mediaSosial->aktif ? 'checked' : '' }}>
            <label for="aktif" class="form-check-label">Aktif</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('media_sosial.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
