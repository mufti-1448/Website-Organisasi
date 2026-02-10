@extends('user.layouts.app')

@section('title', 'Detail Anggota - ' . $anggota->nama)

@section('content')
<style>
    .hero-section {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border-radius: 0;
    }
    
    .profile-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .detail-section {
        background: #f8f9fc;
        border-radius: 10px;
        padding: 2rem;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .info-icon {
        width: 40px;
        height: 40px;
        background: #0d6efd;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
    }
</style>

<section class="hero-section text-white py-5">
    <div class="container text-center py-4">
        <h1 class="fw-bold mb-2">Detail Anggota</h1>
        <p class="lead mb-0">Informasi lengkap tentang anggota organisasi</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card">
                    <!-- Profile Header -->
                    <div class="bg-primary text-white p-4 text-center">
                        @if($anggota->foto)
                            <img src="{{ asset('storage/uploads/anggota/' . $anggota->foto) }}" 
                                 class="profile-img" alt="{{ $anggota->nama }}">
                        @else
                            <i class="bi bi-person-circle profile-img bg-light text-secondary d-inline-flex align-items-center justify-content-center" 
                               style="font-size: 5rem;"></i>
                        @endif
                        <h3 class="mt-3 mb-1">{{ $anggota->nama }}</h3>
                        <span class="badge bg-light text-primary fs-6 px-3 py-2">{{ $anggota->jabatan }}</span>
                    </div>
                    
                    <!-- Profile Details -->
                    <div class="detail-section">
                        <h4 class="mb-4 text-center">Informasi Lengkap</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>
                                    <div>
                                        <strong>Kelas</strong><br>
                                        <span class="text-muted">{{ $anggota->kelas }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>
                                    <div>
                                        <strong>Email</strong><br>
                                        <span class="text-muted">{{ $anggota->email }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div>
                                        <strong>Kontak</strong><br>
                                        <span class="text-muted">{{ $anggota->kontak }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <div>
                                        <strong>Alamat</strong><br>
                                        <span class="text-muted">{{ $anggota->alamat ?: 'Tidak tersedia' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="{{ route('user.anggota.index') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Anggota
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
