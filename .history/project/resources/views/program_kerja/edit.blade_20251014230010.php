@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-pencil-square"></i> Edit Program Kerja</h3>

    <form action="{{ route('program_kerja.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID Program</label>
            <input type="text" class="form-control" value="{{ $program->id }}" readonly>
        </div>

        <div class="mb-3">
            <label>Nama Program</label>
            <input type="text" name="nama" class="form-control" value="{{ $program->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $program->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Penanggung Jawab</label>
            <select name="penanggung_jawab_id" class="form-control" required>
                @foreach($anggota as $a)
                <option value="{{ $a->id }}" {{ $program->penanggung_jawab_id == $a->id ? 'selected' : '' }}>
                    {{ $a->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="belum" {{ $program->status == 'belum' ? 'selected' : '' }}>Belum</option>
                <option value="berlangsung" {{ $program->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                <option value="selesai" {{ $program->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
