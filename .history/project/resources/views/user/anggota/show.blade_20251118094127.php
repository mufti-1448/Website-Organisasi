@extends('user.layouts.app')

@section('title', 'Detail Anggota - ' . $anggota->nama)

@section('content')

<style>
    /* HERO SECTION */
    .hero-section {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::after {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.15);
    }

    .hero-section h1,
    .hero-section p {
        position: relative;
        z-index: 2;
    }

    /* PROFILE CARD */
    .profile-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        overflow: hidden;
        border: 1px solid #eef1f5;
    }

    /* PROFILE IMAGE */
    .profile-img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #fff;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    /* BADGE JABATAN */
    .role-badge {
        background: #ffffff;
        color: #0d6efd;
        border-radius: 50px;
        padding: 6px 18px;
        font-size: 15px;
        font-weight: 600;
        box-shadow: 0px 4px 8px rgba(0,0,0,0.08);
        display: inline-block;
        margin-top: 5px;
    }

    /* DETAIL SECTION BACKGROUND */
    .detail-section {
        background: #f8f9fb;
        border-radius: 12px;
        padding: 2.5rem;
        margin-top: -20px;
    }

    /* DETAIL ITEMS */
    .info-item {
        background: white;
        border-radius: 12px;
        padding: 15px 18px;
        display: flex;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: 1px solid #eef2f7;
        transition: 0.2s ease;
    }

    .info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.07);
    }

    .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #0d6efd;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 14px;
        font-size: 1.3rem;
    }

    @media (max-width: 768px) {
        .detail-section {
            padding: 1.5rem;
        }
    }
</style>

<!-- HERO -->
<section class="hero-section">
    <h1 class="fw-bold mb-2">Detail Anggota</h1>
    <p class="lead mb-0">Informasi lengkap mengenai anggota organisasi</p>
</section>

<!-- PROFILE CONTENT -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="profile-card">

                    <!-- Header -->
                    <div class="bg-primary text-white p-4 text-center position-relative">

                        @if($anggota->foto)
                            <img src="{{ asset('storage/uploads/anggota/' . $anggota->foto) }}"
                                class="profile-img" alt="{{ $anggota->nama }}">
                        @else
                            <div class="d-flex justify-content-center">
                                <div class="profile-img d-flex align-items-center justify-content-center bg-light text-secondary">
                                    <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                                </div>
                            </div>
                        @endif

                        <h3 class="mt-3 mb-1">{{ $anggota->nama }}</h3>
                        <span class="role-badge">{{ $anggota->jabatan }}</span>
                    </div>

                    <!-- DETAIL -->
                    <div class="detail-section">

                        <h4 class="mb-4 text-center fw-semibold">Informasi Lengkap</h4>

                        <div class="row g-3">

                            <!-- Kelas -->
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon"><i class="bi bi-mortarboard-fill"></i></div>
                                    <div>
                                        <strong>Kelas</strong><br>
                                        <span class="text-muted">{{ $anggota->kelas }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                                    <div>
                                        <strong>Email</strong><br>
                                        <span class="text-muted">{{ $anggota->email }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kontak -->
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                                    <div>
                                        <strong>Kontak</strong><br>
                                        <span class="text-muted">{{ $anggota->kontak }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                                    <div>
                                        <strong>Alamat</strong><br>
                                        <span class="text-muted">{{ $anggota->alamat ?: 'Tidak tersedia' }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Back Button -->
                        <div class="text-center mt-4">
                            <a href="{{ route('user.anggota.index') }}" class="btn btn-primary px-4 py-2">
                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali ke Daftar Anggota
                            </a>
                        </div>

                    </div><!-- end detail-section -->

                </div><!-- end profile-card -->

            </div>
        </div>
    </div>
</section>

@endsection
