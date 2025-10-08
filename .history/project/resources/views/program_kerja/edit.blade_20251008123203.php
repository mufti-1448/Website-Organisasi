@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Program Kerja</h2>
        <form action="{{ route('programkerja.update', $programKerja->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Program</label>
                <input type="text" name="nama_program" value="{{ $programKerja->nama_program }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" value="{{ $programKerja->penanggung_jawab }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" value="{{ $programKerja->tanggal_pelaksanaan }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ $programKerja->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('programkerja.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
