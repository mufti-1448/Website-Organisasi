@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<h2><i class="bi bi-person-lines-fill me-2"></i> Detail Anggota</h2>
<hr>

<div class="card shadow-sm">
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
        <p><strong>Jabatan:</strong> {{ $anggota->jabatan }}</p>
        <p><strong>Email:</strong> {{ $anggota->email }}</p>
        <p><strong>No HP:</strong> {{ $anggota->no_hp }}</p>
        <p><strong>Dibuat:</strong> {{ $anggota->created_at->format('d M Y, H:i') }}</p>
    </div>
</div>

<a href="{{ route('anggota.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection
