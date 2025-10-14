@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Rapat</h3>

    <form action="{{ route('rapat.update', $rapat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID Rapat</label>
            <input type="text" class="form-control" value="{{ $rapat->id }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $rapat->judul }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $rapat->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $rapat->tempat }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Rapat</label>
            <select name="status" class="form-select">
                <option value="belum" {{ $rapat->status=='belum'?'selected':'' }}>Belum</option>
                <option value="berlangsung" {{ $rapat->status=='berlangsung'?'selected':'' }}>Berlangsung</option>
                <option value="selesai" {{ $rapat->status=='selesai'?'selected':'' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto Dokumentasi Baru</label>
            <input type="file" name="foto[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Dokumentasi Lama</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($rapat->dokumentasi as $dok)
                    <img src="{{ asset('storage/'.$dok->foto) }}" alt="foto" class="img-thumbnail" width="100">
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Update</button>
        <a href="{{ route('rapat.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </form>
</div>
@endsection
