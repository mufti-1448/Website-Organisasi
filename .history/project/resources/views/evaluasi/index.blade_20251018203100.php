@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-clipboard-check"></i> Daftar Evaluasi</h3>
        <a href="{{ route('evaluasi.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Tambah Evaluasi
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Nama Program Kerja</th>
                    <th>Tanggal</th>
                    <th>Penulis</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluasi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->programKerja->nama ?? '-' }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>
                            @if($item->file)
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-file-earmark-arrow-down"></i> Lihat
                                </a>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showModal{{ $item->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
    </div>
@endsection
