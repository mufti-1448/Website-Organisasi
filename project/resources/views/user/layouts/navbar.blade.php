<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('user.beranda.index') }}">
            <i class="bi bi-people-fill me-2"></i>Dewan Ambalan
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.beranda.index') ? 'active' : '' }}"
                        href="{{ route('user.beranda.index') }}">Beranda</a>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.tentang_kami.*') ? 'active' : '' }}"
                        href="{{ route('user.tentang_kami.index') }}">Tentang</a></li>
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
