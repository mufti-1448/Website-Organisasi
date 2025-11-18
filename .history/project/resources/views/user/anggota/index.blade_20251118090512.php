@extends('user.layouts.app')

@section('title', 'Anggota')

@section('content')

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border-radius: 0;
        }
    </style>

    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-3">Daftar Anggota</h1>
            <p class="lead">Berikut adalah daftar anggota Dewan Ambalan yang aktif berpartisipasi dalam kegiatan organisasi
            </p>
        </div>
    </section>

    <section class="organisation-section py-5">
        <div class="container">

            <h3 class="text-center fw-bold mb-4">Struktur Organisasi</h2>
                <div class="section-line mx-auto mb-5"></div>

                <div class="row g-4 justify-content-center">
                    @foreach ($anggota as $item)
                        <div class="col-12 col-sm-6 col-md-3 ">
                            <div class="org-card text-center shadow-lg p-4">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}" class="org-img"
                                        alt="{{ $item->nama }}">
                                @else
                                    <i class="bi bi-person-circle text-secondary fs-2"></i>
                                @endif
                                <h5 class="mt-3 mb-1">{{ $item->nama }}</h5>
                                <small class="text-primary">{{ $item->jabatan }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </section>
@endsection
