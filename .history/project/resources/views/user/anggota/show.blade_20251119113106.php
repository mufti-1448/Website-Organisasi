@extends('user.layouts.app')

@section('title', 'Detail Anggota - ' . $anggota->nama)

@section('content')

    <style>
        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .profile-img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
        }

        .detail-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: .35rem;
        }

        .info-item {
            padding: 12px 0;
            border-bottom: 1px solid #e7e9ef;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #eaf2ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 1.2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-img {
                width: 110px;
                height: 110px;
            }
        }
    </style>

    <section class="hero-section text-dark py-4">
        <div class="container text-center py-3">
            <h1 class="fw-bold mb-2">Detail Anggota</h1>
            <p class="lead">Informasi lengkap anggota</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="profile-card">
                        <div class="text-center bg-primary text-white p-4">
                            @if ($anggota->foto)
                                <img src="{{ asset('storage/uploads/anggota/' . $anggota->foto) }}" class="profile-img"
                                    alt="{{ $anggota->nama }}">
                            @else
                                <div
                                    class="profile-img d-flex align-items-center justify-content-center bg-light text-secondary">
                                    <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <h3 class="mt-3 mb-1 text">{{ $anggota->nama }}</h3>
                            <span class="badge bg-light text-primary px-3 py-2 fw-semibold">
                                {{ $anggota->jabatan }}
                            </span>

                        </div>

                        <!-- Detail -->
                        <div class="p-4">

                            <h5 class="fw-bold mb-3">Informasi Lengkap</h5>

                            <div class="info-item d-flex">
                                <div class="info-icon"><i class="bi bi-mortarboard-fill"></i></div>
                                <div>
                                    <div class="detail-title">Kelas</div>
                                    <span class="text-muted">{{ $anggota->kelas }}</span>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                                <div>
                                    <div class="detail-title">Email</div>
                                    <span class="text-muted">{{ $anggota->email }}</span>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                                <div>
                                    <div class="detail-title">Kontak</div>
                                    <span class="text-muted">{{ $anggota->kontak }}</span>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                                <div>
                                    <div class="detail-title">Alamat</div>
                                    <span class="text-muted">{{ $anggota->alamat ?: 'Tidak tersedia' }}</span>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('user.anggota.index') }}" class="btn btn-primary px-4">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
