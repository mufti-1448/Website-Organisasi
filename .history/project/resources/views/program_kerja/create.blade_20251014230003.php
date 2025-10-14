@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-plus-square"></i> Tambah Program Kerja</h3>

    <form action="{{ route('program_kerja.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ID Program</label>
            <input type="text" name="id" class="form-control" value="{{ $nextCode }}" readonly>
        </div>

        <div class="mb-3">
            <label>Nama Program</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Penanggung Jawab</label>
            <select name="penanggung_jawab_id" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="belum">Belum</option>
                <option value="berlangsung">Berlangsung</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
