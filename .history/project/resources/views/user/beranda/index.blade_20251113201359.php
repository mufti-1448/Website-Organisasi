@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Selamat Datang di Website Organisasi</h1>
                <p class="text-center">Ini adalah halaman beranda untuk pengguna umum.</p>
            </div>
        </div>
    </div>

    <section class="hero position-relative">
        {{-- Background Image --}}
        <img src="{{ asset('images/profil1762324402.jpg') }}" class="w-100" style="height: 90vh; object-fit: cover;" alt="Hero Image">

        {{-- Overlay biru transparan --}}
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 45, 134, 0.65);"></div>

        {{-- Konten teks --}}
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center px-4"
            style="max-width: 800px;">
            <h1 class="fw-bold display-5 mb-3">Website Organisasi <br> Dewan Ambalan</h1>
            <p class="mb-4 fs-5">
                Platform digital untuk mengelola dan mengembangkan kegiatan organisasi
                Dewan Ambalan dengan transparansi dan akuntabilitas yang tinggi.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('user.program_kerja.index') }}" class="btn btn-light fw-semibold px-4 py-2">
                    Lihat Program
                </a>
                <a href="{{ route('user.kontak.index') }}" class="btn btn-outline-light fw-semibold px-4 py-2">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

@endsection
