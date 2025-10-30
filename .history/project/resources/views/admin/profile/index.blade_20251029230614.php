@extends('admin.layouts.app')

@section('title', 'Profil Admin')

@section('content')
<style>
    /* ===== Basic Style Upgrade ===== */
    .profile-container {
        background: #ffffff;
        padding: 35px;
        border-radius: 16px;
        border: 1px solid #e2e3e5;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 6px 15px rgba(13, 110, 253, 0.35);
    }

    .profile-avatar i {
        font-size: 3.8rem;
        color: white;
    }

    .profile-name {
        font-size: 1.55rem;
        font-weight: 700;
        color: #212529;
    }

    .profile-role {
        color: #6c757d;
        font-size: 1rem;
        font-weight: 500;
    }

    /* Card Info */
    .info-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e4e7eb;
        padding: 18px 22px;
        margin-bottom: 18px;
        transition: 0.2s;
    }

    .info-card:hover {
        border-color: #0d6efd;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 98, 255, 0.08);
    }

    .info-card h6 {
        font-size: 0.95rem;
        color: #0157c8;
        font-weight: 700;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .info-label {
        color: #6c757d;
        font-weight: 500;
    }

    .info-value {
        font-weight: 600;
        color: #212529;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-semibold"><i class="bi bi-person-circle"></i> Profil Admin</h3>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="bi bi-person-fill"></i>
            </div>
            <h4 class="profile-name">{{ $user['name'] ?? 'Administrator' }}</h4>
            <p class="profile-role">Administrator Sistem</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Info Akun -->
                <div class="info-card">
                    <h6><i class="bi bi-info-circle"></i> Informasi Akun</h6>

                    <div class="info-item">
                        <span class="info-label">Nama Lengkap</span>
                        <span class="info-value">{{ $user['name'] ?? 'Administrator' }}</span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $user['email'] ?? '-' }}</span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Bergabung Sejak</span>
                        <span class="info-value">{{ isset($user['created_at']) ? $user['created_at']->format('d M Y') : '-' }}</span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Terakhir Login</span>
                        <span class="info-value">{{ isset($user['updated_at']) ? $user['updated_at']->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>

                <!-- Status Akun -->
                <div class="info-card">
                    <h6><i class="bi bi-shield-check"></i> Status Akun</h6>

                    <div class="info-item">
                        <span class="info-label">Status</span>
                        <span class="info-value">
                            <span class="badge bg-success rounded-pill px-3 py-2">Aktif</span>
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Role</span>
                        <span class="info-value">Administrator</span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
