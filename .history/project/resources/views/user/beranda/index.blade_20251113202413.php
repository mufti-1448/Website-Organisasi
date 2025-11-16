@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero position-relative w-100 overflow-hidden" style="height: 80vh;">
        {{-- Background + overlay langsung --}}
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(rgba(0, 45, 134, 0.65), rgba(0, 45, 134, 0.65)),
                 url('{{ asset('images/profiles/1762324402.jpg') }}') center/cover no-repeat;">
        </div>

        {{-- Konten teks di kiri --}}
        <div class="container h-100 d-flex align-items-center position-relative">
            <div class="text-white col-lg-6 col-md-8">
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
    </section>

    {{-- Section Profil Organisasi --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                {{-- Kolom kiri (teks) --}}
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="fw-bold mb-4">Profil Organisasi</h2>

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
                    <img src="{{ asset('images/profiles/1762324402.jpg) }}" alt="Profil Organisasi"
                        class="img-fluid rounded-4 shadow-sm" style="max-width: 90%; height: auto;">
                </div>
            </div>
        </div>
    </section>

@endsection
