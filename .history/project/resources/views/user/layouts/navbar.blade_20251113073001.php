<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-people-fill text-primary fs-3 me-2"></i>
            <span class="fw-bold text-dark">Dewan Ambalan</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fw-medium">
                <li class="nav-item"><a class="nav-link active" href="{{ route('user.beranda') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.tentang_kami') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.program_anggota') }}">Program</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.rapat') }}">Rapat</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.notulen') }}">Notulen</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.evaluasi') }}">Evaluasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.dokumentasi') }}">Dokumentasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.kontak') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
