<nav class=\"navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top\">
    <div class=\"container-lg\">
        <a class=\"navbar-brand fw-bold\" href=\"{{ route('user.beranda') }}\">\n <span class=\"text-primary\"
                style=\"font-size: 1.3rem;\">Dewan Ambalan</span>
        </a>

        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\"\n
            aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
            <ul class=\"navbar-nav ms-auto\">
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.beranda') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.beranda') }}\">Beranda</a></li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.tentang_kami') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.tentang_kami') }}\">Tentang Kami</a></li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.anggota.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.anggota.index') }}\">Anggota</a></li>
                <li class=\"nav-item\">
                    <a\n class=\"nav-link {{ request()->routeIs('user.program_kerja.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.program_kerja.index') }}\">Program</a>
                </li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.rapat.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.rapat.index') }}\">Rapat</a></li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.notulen.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.notulen.index') }}\">Notulen</a></li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.evaluasi.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.evaluasi.index') }}\">Evaluasi</a></li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.dokumentasi.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.dokumentasi.index') }}\">Dokumentasi</a></li>
                <li class=\"nav-item\"><a class=\"nav-link
                        {{ request()->routeIs('user.kontak.*') ? 'active fw-bold' : '' }}\"\n
                        href=\"{{ route('user.kontak.index') }}\">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
href="{{ route('user.dokumentasi.index') }}">Dokumentasi</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('user.kontak.*') ? 'active' : '' }}"
        href="{{ route('user.kontak.index') }}">Kontak</a></li>
</ul>
</div>
</div>
</nav>
