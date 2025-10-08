@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Detail Anggota</h1>
    <div>
        <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($anggota->foto)
                    <img src="{{ asset('uploads/anggota/' . $anggota->foto) }}" alt="Foto {{ $anggota->nama }}" class="img-fluid rounded mb-3" style="max-width: 200px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; margin: 0 auto;">
                        <i class="bi bi-person-circle" style="font-size: 5rem; color: #6c757d;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <dl class="row">
                    <dt class="col-sm-3">ID Anggota</dt>
                    <dd class="col-sm-9">{{ $anggota->id }}</dd>

                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">{{ $anggota->nama }}</dd>

                    <dt class="col-sm-3">Kelas</dt>
                    <dd class="col-sm-9">{{ $anggota->kelas }}</dd>

                    <dt class="col-sm-3">Jabatan</dt>
                    <dd class="col-sm-9">{{ $anggota->jabatan }}</dd>

                    <dt class="col-sm-3">Kontak</dt>
                    <dd class="col-sm-9">{{ $anggota->kontak }}</dd>

                    <dt class="col-sm-3">Dibuat</dt>
                    <dd class="col-sm-9">{{ $anggota->created_at ? $anggota->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}</dd>

                    <dt class="col-sm-3">Diupdate</dt>
                    <dd class="col-sm-9">{{ $anggota->updated_at ? $anggota->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
