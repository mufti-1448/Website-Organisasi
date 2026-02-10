<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengaturan->nama_organisasi ?? 'Website Organisasi' }}</title>
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
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    @if ($carousels->count() > 0)
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($carousels as $index => $carousel)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $carousel->gambar) }}" class="d-block w-100"
                            alt="{{ $carousel->judul }}" style="height: 400px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $carousel->judul }}</h5>
                            <p>{{ $carousel->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    @endif

    <!-- Welcome Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4">Selamat Datang di {{ $pengaturan->nama_organisasi ?? 'Organisasi Kami' }}</h1>
                @if ($profil)
                    <p class="lead">{{ $profil->deskripsi }}</p>
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
