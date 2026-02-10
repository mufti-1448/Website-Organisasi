@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero position-relative">
        {{-- Background gambar --}}
        <div class="hero-bg"
            style="background: linear-gradient(rgba(0, 45, 134, 0.65), rgba(0, 45, 134, 0.65)), 
                 url('{{ asset('images/herosection/hero1.jpeg') }}') center/cover no-repeat; 
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
                        Platform digital untuk melihat informasi lengkap seputar kegiatan, program kerja, evaluasi, notulen rapat,
                        dan anggota Dewan Ambalan.
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

    {{-- Section Profil Organisasi --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                {{-- Kolom kiri (teks) --}}
                <div class="col-md-6 mb-4 mb-md-0">
                    <h3 class="fw-bold mb-4">Profil Organisasi</h2>

                    <h5 class="text-primary fw-semibold">Visi</h5>
                    <p class="text-muted mb-4">
                        Menjadi organisasi Dewan Ambalan yang unggul, inovatif, dan berkarakter dalam mengembangkan potensi
                        anggota serta berkontribusi positif bagi masyarakat.
                    </p>

                    <h5 class="text-primary fw-semibold">Misi</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2">
                            <i class="bi bi-check2 text-primary me-2"></i>
                            Menyelenggarakan program-program yang berkualitas dan bermanfaat
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check2 text-primary me-2"></i>
                            Mengembangkan kepemimpinan dan karakter anggota
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check2 text-primary me-2"></i>
                            Membangun kerjasama yang solid antar anggota
                        </li>
                    </ul>
                </div>

                {{-- Kolom kanan (gambar) --}}
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/herosection/hero1.jpeg') }}" alt="Profil Organisasi"
                        class="img-fluid rounded-4 shadow-sm" style="max-width: 90%; height: auto;">
                </div>
            </div>
        </div>
    </section>

@endsection
