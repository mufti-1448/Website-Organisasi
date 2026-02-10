<style>
    .nav-item a{
        font-size: 15px
    }
</style>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse position-fixed"
    style="top: 56px; height: calc(100vh - 56px); z-index: 1030;">
    <div class="pt-3 h-100 d-flex flex-column">

        {{-- Menu Utama --}}
        <ul class="nav flex-column flex-grow-1 overflow-y-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.anggota.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('admin.anggota.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-people-fill me-2"></i> Anggota
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.rapat.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('admin.rapat.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-calendar-event-fill me-2"></i> Rapat
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.program_kerja.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('admin.program_kerja.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-clipboard-check-fill me-2"></i> Program Kerja
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.notulen.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('admin.notulen.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-journal-text me-2"></i> Notulen
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.evaluasi.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('admin.evaluasi.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-graph-up-arrow me-2"></i> Evaluasi
                </a>
            </li>

        </ul>

    </div>
</nav>
