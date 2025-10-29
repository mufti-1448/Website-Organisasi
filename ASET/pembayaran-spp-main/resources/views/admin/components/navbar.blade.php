    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <a href="#" class="sidebar-brand">
            <i class="fas fa-graduation-cap me-2"></i>
            SPP Admin
        </a>

        <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="sidebar-link sidebar-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
            <a href="{{ route('siswa.index') }}" class="sidebar-link">
                <i class="fas fa-user-graduate me-2"></i>
                Siswa
            </a>
            <a href="{{ route('kelas.index') }}" class="sidebar-link {{ request()->routeIs('kelas.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>
                Kelas
            </a>
            <a href="{{ route('spp.index') }}" class="sidebar-link">
                <i class="fas fa-money-bill-wave me-2"></i>
                SPP
            </a>
            <a href="{{ route('pembayaran.index') }}" class="sidebar-link">
                <i class="fas fa-receipt me-2"></i>
                Pembayaran
            </a>
            <a href="{{ route('logout') }}" class="sidebar-link mt-auto" onclick="logout()">
                <i class="fas fa-sign-out-alt me-2"></i>
                Logout
            </a>
        </div>
    </nav>
