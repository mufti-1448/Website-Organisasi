@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Program Kerja</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama Program:</strong> {{ $programKerja->nama_program }}</p>
            <p><strong>Penanggung Jawab:</strong> {{ $programKerja->penanggung_jawab }}</p>
            <p><strong>Tanggal Pelaksanaan:</strong> {{ $programKerja->tanggal_pelaksanaan }}</p>
            <p><strong>Keterangan:</strong> {{ $programKerja->keterangan }}</p>
        </div>
    </div>

    <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
