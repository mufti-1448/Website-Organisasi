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

    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            {{-- Slide 1 --}}
            <div class="carousel-item active">
                <div class="position-relative">
                    {{-- Gambar background --}}
                    <img src="{{ asset('images/hero1.jpg') }}" class="d-block w-100"
                        style="height: 90vh; object-fit: cover;" alt="Hero 1">

                    {{-- Overlay biru transparan --}}
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background-color: rgba(0, 45, 134, 0.65);"></div>

                    {{-- Konten teks di tengah --}}
                    <div class="position-absolute top-50 start-50 translate-middle text-white text-center px-4"
                        style="max-width: 800px;">
                        <h1 class="fw-bold display-5">Website Organisasi <br> Dewan Ambalan</h1>
                        <p class="mt-3 mb-4">
                            Platform digital untuk mengelola dan mengembangkan kegiatan organisasi Dewan Ambalan dengan
                            transparansi dan akuntabilitas yang tinggi.
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
                </div>
            </div>

            {{-- Slide 2 (opsional) --}}
            <div class="carousel-item">
                <div class="position-relative">
                    <img src="{{ asset('images/hero2.jpg') }}" class="d-block w-100"
                        style="height: 90vh; object-fit: cover;" alt="Hero 2">
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background-color: rgba(0, 45, 134, 0.65);"></div>
                    <div class="position-absolute top-50 start-50 translate-middle text-white text-center px-4"
                        style="max-width: 800px;">
                        <h1 class="fw-bold display-5">Bangun Semangat Kepemimpinan</h1>
                        <p class="mt-3 mb-4">
                            Bersama Dewan Ambalan, kita belajar, tumbuh, dan mengabdi untuk masa depan yang lebih baik.
                        </p>
                        <a href="{{ route('user.tentang_kami') }}" class="btn btn-light fw-semibold px-4 py-2">Pelajari
                            Lebih Lanjut</a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Navigasi carousel --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </button>
    </div>


@endsection
