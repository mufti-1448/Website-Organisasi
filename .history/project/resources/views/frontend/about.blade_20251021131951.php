<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - {{ $pengaturan->nama_organisasi ?? 'Website Organisasi' }}</title>
    @if ($pengaturan && $pengaturan->favicon)
        <link rel="icon" href="{{ asset('storage/' . $pengaturan->favicon) }}" type="image/x-icon">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if ($pengaturan && $pengaturan->logo)
                    <img src="{{ asset('storage/' . $pengaturan->logo) }}" alt="Logo" height="40">
                @endif
                {{ $pengaturan->nama_organisasi ?? 'Organisasi' }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- About Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 text-center mb-4">Tentang Kami</h1>

                @if ($tentang)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{ $tentang->judul }}</h2>
                            <p class="card-text">{!! nl2br(e($tentang->konten)) !!}</p>
                        </div>
                    </div>
                @endif

                @if ($profil)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3>Profil Organisasi</h3>
                        </div>
                        <div class="card-body">
                            <h4>{{ $profil->nama_organisasi }}</h4>
                            <p>{{ $profil->deskripsi }}</p>

                            <h5>Visi</h5>
                            <p>{{ $profil->visi }}</p>

                            <h5>Misi</h5>
                            <p>{{ $profil->misi }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{ $pengaturan->nama_organisasi ?? 'Organisasi' }}</h5>
                    <p>{{ $pengaturan->alamat ?? '' }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Follow Us</h5>
                    <div>
                        @if ($pengaturan->facebook)
                            <a href="{{ $pengaturan->facebook }}" class="text-light me-3">Facebook</a>
                        @endif
                        @if ($pengaturan->instagram)
                            <a href="{{ $pengaturan->instagram }}" class="text-light me-3">Instagram</a>
                        @endif
                        @if ($pengaturan->youtube)
                            <a href="{{ $pengaturan->youtube }}" class="text-light me-3">YouTube</a>
                        @endif
                        @if ($pengaturan->whatsapp)
                            <a href="https://wa.me/{{ $pengaturan->whatsapp }}" class="text-light">WhatsApp</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
