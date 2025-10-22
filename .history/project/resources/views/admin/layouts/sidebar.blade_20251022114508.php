<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse position-fixed"
    style="top: 56px; height: calc(100vh - 56px); z-index: 1030;">
    <div class="pt-3 h-100 d-flex flex-column">

        {{-- Menu Utama --}}
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('anggota.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('anggota.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-people-fill me-2"></i> Anggota
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rapat.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('rapat.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-calendar-event-fill me-2"></i> Rapat
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('program_kerja.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('program_kerja.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-clipboard-check-fill me-2"></i> Program Kerja
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('notulen.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('notulen.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-journal-text me-2"></i> Notulen
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('evaluasi.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('evaluasi.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-graph-up-arrow me-2"></i> Evaluasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokumentasi.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('dokumentasi.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-image-fill me-2"></i> Dokumentasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kontak.index') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('kontak.*') ? 'active text-light bg-secondary bg-opacity-50' : 'text-light' }}">
                    <i class="bi bi-chat-dots-fill me-2"></i> Kontak
                </a>
            </li>
        </ul>

        {{-- Footer Sidebar --}}
        <div class="mt-auto p-3 border-top border-secondary">
            <small class="text-light">Logged in as:</small><br>
            <span class="text-light fw-semibold">{{ Auth::user()->name ?? 'Admin' }}</span>
        </div>
    </div>
</nav>

{{-- Tambahkan sedikit CSS khusus agar tampil lebih halus --}}
@push('styles')
    <style>
        .sidebar {
            min-height: 80vh;
        }

        .sidebar .nav-link {
            padding: 0.6rem 1rem;
            font-size: 0.95rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2) !important;
            font-weight: 600;
        }

        /* Mobile responsiveness */
        @media (max-width: 767.98px) {
            #sidebarMenu {
                width: auto !important;
                min-width: 200px;
                max-width: 70vw;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            #sidebarMenu.show {
                transform: translateX(0);
            }
        }
    </style>
@endpush

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebarMenu');
        sidebar.classList.toggle('show');
    }

    // Close sidebar when clicking outside on mobile or clicking the toggle button again
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebarMenu');
        const toggleBtn = document.querySelector('[data-bs-target="#sidebarMenu"]');
        if (window.innerWidth < 768) {
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('show');
            } else if (toggleBtn.contains(event.target) && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        }
    });
</script>
