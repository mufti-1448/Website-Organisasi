<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-people-fill text-primary fs-3 me-2"></i>
            <span class="fw-bold text-dark">Dewan Ambalan</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fw-semald gap-3">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.beranda') ? 'active' : '' }}"
                        href="{{ route('user.beranda') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.tentang_kami') ? 'active' : '' }}"
                        href="{{ route('user.tentang_kami') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.anggota.*') ? 'active' : '' }}"
                        href="{{ route('user.anggota.index') }}">Anggota</a></li>
                <li class="nav-item"><a
                        class="nav-link {{ request()->routeIs('user.program_kerja.*') ? 'active' : '' }}"
                        href="{{ route('user.program_kerja.index') }}">Program</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.rapat.*') ? 'active' : '' }}"
                        href="{{ route('user.rapat.index') }}">Rapat</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.notulen.*') ? 'active' : '' }}"
                        href="{{ route('user.notulen.index') }}">Notulen</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.evaluasi.*') ? 'active' : '' }}"
                        href="{{ route('user.evaluasi.index') }}">Evaluasi</a></li>

                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.kontak.*') ? 'active' : '' }}"
                        href="{{ route('user.kontak.index') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
