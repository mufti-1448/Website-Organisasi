@extends('user.layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-2"><i class="bi bi-people-fill text-primary me-2"></i>Daftar Anggota</h2>
            <p class="text-muted">Berikut adalah daftar anggota Dewan Ambalan SMK Syafii Akrom</p>
        </div>
    </div>

    @if($anggota->count())
        <div class="row g-4">
            @foreach($anggota as $item)
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-shadow">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="bi bi-person-fill fs-2 text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <h5 class="card-title text-center mb-1">{{ $item->nama }}</h5>
                            <p class="text-center text-muted small mb-2">{{ $item->kelas }}</p>
                            
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1"><i class="bi bi-briefcase me-1"></i><strong>Jabatan:</strong></small>
                                <p class="small">{{ $item->jabatan }}</p>
                            </div>

                            <div>
                                <small class="text-muted d-block mb-1"><i class="bi bi-telephone me-1"></i><strong>Kontak:</strong></small>
                                <p class="small">{{ $item->kontak }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle me-2"></i>Belum ada data anggota
        </div>
    @endif
</div>

<style>
    .hover-shadow {
        transition: box-shadow 0.3s ease;
    }
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endsection