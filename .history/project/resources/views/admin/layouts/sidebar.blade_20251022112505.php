<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar stiky collapse">
    <div class="pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('anggota.index') }}"
                    class="nav-link {{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i> Anggota
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rapat.index') }}"
                    class="nav-link {{ request()->routeIs('rapat.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event-fill me-2"></i> Rapat
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('program_kerja.index') }}"
                    class="nav-link {{ request()->routeIs('program_kerja.*') ? 'active' : '' }}">
                    <i class="bi bi-clipboard-check-fill me-2"></i> Program Kerja
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('notulen.index') }}"
                    class="nav-link {{ request()->routeIs('notulen.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text me-2"></i> Notulen
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('evaluasi.index') }}"
                    class="nav-link {{ request()->routeIs('evaluasi.*') ? 'active' : '' }}">
                    <i class="bi bi-graph-up-arrow me-2"></i> Evaluasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokumentasi.index') }}"
                    class="nav-link {{ request()->routeIs('dokumentasi.*') ? 'active' : '' }}">
                    <i class="bi bi-image-fill me-2"></i> Dokumentasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kontak.index') }}"
                    class="nav-link {{ request()->routeIs('kontak.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots-fill me-2"></i> Kontak
                </a>
            </li>

        </ul>
    </div>
</nav>
