@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class=\"py-5\" style=\"background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: white; min-height: 70vh; display: flex; align-items: center;\">
        <div class=\"container-lg\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-6\">
                    <h1 class=\"fw-bold mb-3\" style=\"font-size: 3rem; line-height: 1.2;\">
                        Dewan Ambalan<br>SMK Syafii Akrom
                    </h1>
                    <p class=\"fs-5 mb-4 opacity-90\">
                        Organisasi yang berkomitmen mengembangkan potensi anggota dan berkontribusi positif bagi kemajuan sekolah serta masyarakat.
                    </p>
                    <div class=\"d-flex gap-3 flex-wrap\">
                        <a href=\"{{ route('user.program_kerja.index') }}\" class=\"btn btn-light fw-semibold px-4 py-2\">
                            Lihat Program Kerja
                        </a>
                        <a href=\"{{ route('user.kontak.index') }}\" class=\"btn btn-outline-light fw-semibold px-4 py-2\">
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
                    <img src="{{ asset('images/profiles/1762324402.jpg') }}" alt="Profil Organisasi"
                        class="img-fluid rounded-4 shadow-sm" style="max-width: 60%; height: auto;">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Program Terbaru</h2>
                <p class="text-muted mb-0">
                    Berbagai program unggulan yang sedang berjalan dan akan datang
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($programTerbaru as $program)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 36px; height: 36px;">
                                        <i class="bi bi-list-task-fill fs-5"></i>
                                    </div>
                                    <span
                                        class="badge ms-auto
                                        @if ($program->status == 'selesai') bg-secondary-subtle text-secondary border border-secondary
                                        @elseif($program->status == 'berlangsung') bg-success-subtle text-success border border-success
                                        @else bg-warning-subtle text-warning border border-warning @endif">
                                        @if ($program->status == 'selesai')
                                            Selesai
                                        @elseif($program->status == 'berlangsung')
                                            Sedang Berjalan
                                        @else
                                            Direncanakan
                                        @endif
                                    </span>
                                </div>
                                <h5 class="fw-semibold mb-2">{{ $program->nama }}</h5>
                                <p class="text-muted mb-3">
                                    {{ $program->deskripsi ?: 'Program kerja organisasi Dewan Ambalan.' }}
                                </p>
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    @if ($program->target_date)
                                        {{ \Carbon\Carbon::parse($program->target_date)->translatedFormat('j F Y') }}
                                    @else
                                        Tanggal belum ditentukan
                                    @endif
                                </div>
                                @if ($program->penanggungJawab)
                                    <div class="d-flex align-items-center text-muted small mt-2">
                                        <i class="bi bi-person me-2"></i>
                                        Penanggung Jawab: {{ $program->penanggungJawab->nama }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Belum ada program kerja yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
