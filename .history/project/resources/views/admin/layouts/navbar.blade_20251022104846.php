{{-- <nav class="navbar navbar-dark bg-dark sticky-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-mortarboard me-2"></i> Sistem Organisasi Sekolah
        </a>

        <div class="d-flex align-items-center">
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- User dropdown / avatar on the right --}}
{{-- <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="user" width="36" height="36"
                        class="rounded-circle me-2">
                    <strong class="d-none d-sm-inline">Admin User</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow"
                    aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div> --}}
{{-- </div>
    </div>
</nav> --}}
<nav class="navbar navbar-dark bg-dark ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
    </div>
</nav>
