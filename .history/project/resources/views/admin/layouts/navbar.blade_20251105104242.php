<nav class="navbar navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container-fluid">
        {{-- Brand / Logo --}}
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-light me-3 d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand d-flex align-items-center m-0 p-2" href="{{ route('admin.dashboard') }}">
                <span class="fw-semibold">Sistem Organisasi Sekolah</span>
            </a>
        </div>

        {{-- User Dropdown --}}
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
                <strong class="d-none d-sm-inline">{{ Auth::user()->name ?? 'Admin User' }}</strong>
            </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow"
                aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                        <i class="bi bi-person-circle me-2"></i> Profil
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
