@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Program Kerja</h2>
        <form action="{{ route('program_kerja.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Program</label>
                <input type="text" name="nama_program" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
