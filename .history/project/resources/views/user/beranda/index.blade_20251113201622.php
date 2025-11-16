@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero position-relative">
        {{-- Background gambar --}}
        <div class="hero-bg"
            style="background: linear-gradient(rgba(0, 45, 134, 0.65), rgba(0, 45, 134, 0.65)), 
                 url('{{ asset('images/profilrs/1762324402.jpg') }}') center/cover no-repeat; 
                 height: 70vh;">
        </div>

        {{-- Konten teks di kiri --}}
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
            <div class="container text-white">
                <div class="col-lg-6 col-md-8">
                    <h1 class="fw-bold display-5 mb-3">
                        Website Organisasi <br> Dewan Ambalan
                    </h1>
                    <p class="fs-5 mb-4">
                        Platform digital untuk mengelola dan mengembangkan kegiatan organisasi
                        Dewan Ambalan dengan transparansi dan akuntabilitas yang tinggi.
                    </p>
                    <div class="d-flex gap-3">
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
    </section>
@endsection
