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
        </ul>

    </div>
</nav>
