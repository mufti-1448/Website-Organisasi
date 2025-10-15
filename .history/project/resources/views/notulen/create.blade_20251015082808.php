@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Notulen</h3>

    <form action="{{ route('notulen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Rapat</label>
            <select name="rapat_id" class="form-control" required>
                <option value="">-- Pilih Rapat --</option>
                @foreach($rapat as $r)
                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Program Kerja (opsional)</label>
            <select name="program_id" class="form-control">
                <option value="">-- Tidak ada --</option>
                @foreach($programKerja as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <select name="penulis_id" class="form-control" required>
                <option value="">-- Pilih Penulis --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Notulen</label>
            <textarea name="isi" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload File (opsional)</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
