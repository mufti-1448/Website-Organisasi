<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row gy-4">
            {{-- Kolom 1: Info Organisasi --}}
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-people-fill text-primary fs-3 me-2"></i>
                    <h5 class="mb-0 fw-bold">Dewan Ambalan</h5>
                </div>
                <p class="text-light small mb-3">
                    Organisasi yang berkomitmen untuk mengembangkan potensi anggota dan berkontribusi positif bagi
                    masyarakat.
                </p>
                <p class="text-light small mb-0">
                    <strong>Alamat:</strong> SMK Syafii Akrom, Indonesia<br>
                    <strong>Email:</strong> info@dewambalan.com
                </p>
            </div>

            {{-- Kolom 2: Link Cepat --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="fw-bold mb-3">Link Cepat</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('user.beranda.index') }}"
                            class="text-light text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('user.tentang_kami.index') }}"
                            class="text-light text-decoration-none">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ route('user.anggota.index') }}"
                            class="text-light text-decoration-none">Anggota</a></li>
                    <li class="mb-2"><a href="{{ route('user.program_kerja.index') }}"
                            class="text-light text-decoration-none">Program Kerja</a></li>
                    <li class="mb-2"><a href="{{ route('user.rapat.index') }}"
                            class="text-light text-decoration-none">Rapat</a></li>
                    <li class="mb-2"><a href="{{ route('user.notulen.index') }}"
                            class="text-light text-decoration-none">Notulen</a></li>
                    <li class="mb-2"><a href="{{ route('user.evaluasi.index') }}"
                            class="text-light text-decoration-none">Evaluasi</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Media Sosial --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="fw-bold mb-3">Media Sosial</h6>
                @if (isset($sosialMedia) && $sosialMedia->count() > 0)
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($sosialMedia as $social)
                            @if ($social->aktif && $social->url)
                                <a href="{{ $social->url }}" target="_blank"
                                    class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;" title="{{ ucfirst($social->platform) }}">
                                    <i class="bi bi-{{ $social->icon ?? 'link' }}"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <p class="text-light small mt-3 mb-0">Ikuti kami di media sosial untuk informasi terbaru.</p>
                @else
                    <p class="text-light small mb-0">Media sosial akan segera tersedia.</p>
                @endif
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-secondary small mb-0">&copy; {{ date('Y') }} Dewan Ambalan SMK Syafii Akrom. Semua
                    hak cipta dilindungi.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="text-secondary small mb-0">Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> untuk
                    komunitas</p>
            </div>
        </div>
    </div>
</footer>
