@extends('user.layouts.app')

@section('title', 'Kontak')

@section('content')
    <style>
        .contact-form {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-send {
            background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }

        .contact-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 2rem;
            height: 100%;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .info-item i {
            color: #0d6efd;
            margin-right: 1rem;
            font-size: 1.2rem;
        }
    </style>

    {{-- ALERT --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3">Hubungi Kami</h1>
                <p class="lead text-muted">Kami siap membantu Anda. Kirim pesan dan kami akan segera merespons.</p>
            </div>
        </div>

        <div class="row g-5">
            {{-- Form Kontak --}}
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3 class="mb-4 fw-semibold">Kirim Pesan</h3>
                    <form action="{{ route('user.kontak.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap Anda" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="pesan" class="form-label fw-semibold">Pesan <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="6"
                                    placeholder="Tuliskan pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-send">
                                    <i class="bi bi-send me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Info Kontak --}}
            <div class="col-lg-4">
                <div class="contact-info">
                    <h4 class="mb-4 fw-semibold text-primary">Informasi Kontak</h4>

                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <strong>Alamat</strong><br>
                            <span class="text-muted">SMK Syafii Akrom, Indonesia</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                            <strong>Email</strong><br>
                            <span class="text-muted">info@dewambalan.com</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-clock-fill"></i>
                        <div>
                            <strong>Jam Operasional</strong><br>
                            <span class="text-muted">Senin - Jumat: 08:00 - 16:00</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-people-fill"></i>
                        <div>
                            <strong>Organisasi</strong><br>
                            <span class="text-muted">Dewan Ambalan SMK Syafii Akrom</span>
                        </div>
                    </div>

                    {{-- Media Sosial --}}
                    @if (isset($sosialMedia) && $sosialMedia->count() > 0)
                        <div class="mt-4">
                            <h5 class="fw-semibold text-primary mb-3">Ikuti Kami</h5>
                            <div class="d-flex gap-3">
                                @foreach ($sosialMedia as $social)
                                    @if ($social->aktif && $social->url)
                                        <a href="{{ $social->url }}" target="_blank"
                                            class="btn btn-outline-primary btn-sm rounded-circle"
                                            title="{{ ucfirst($social->platform) }}">
                                            <i class="bi bi-{{ $social->icon ?? 'link' }}"></i>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Auto dismiss alert after 5 seconds
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    </script>
@endsection
