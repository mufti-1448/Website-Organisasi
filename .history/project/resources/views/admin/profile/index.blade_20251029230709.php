@extends('admin.layouts.app')

@section('title', 'Profil Admin')

@section('content')
<style>
    .profile-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    .profile-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 25px;
        border: 1px solid #e3e6ea;
        box-shadow: 0 6px 20px rgba(0,0,0,0.06);
    }

    .profile-sidebar {
        text-align: center;
        border-right: 1px solid #e9ecef;
    }

    .profile-avatar {
        width: 130px;
        height: 130px;
        background: #0d6efd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        box-shadow: 0 8px 25px rgba(13,110,253,0.3);
    }

    .profile-avatar i {
        font-size: 4rem;
        color: #fff;
    }

    .profile-name {
        font-size: 1.55rem;
        font-weight: 700;
    }

    .profile-role {
        font-size: 0.95rem;
        color: #6c757d;
        margin-bottom: 20px;
    }

    /* Right info section */
    .info-section h5 {
        font-size: 1.05rem;
        font-weight: 700;
        color: #0d6efd;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-list li {
        padding: 10px 0;
        border-bottom: 1px solid #edf0f3;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .info-label {
        font-size: 0.93rem;
        color: #6c757d;
        font-weight: 500;
    }

    .info-value {
        font-size: 0.93rem;
        color: #212529;
        font-weight: 600;
    }

    .badge-status {
        padding: 6px 10px;
        font-size: 0.8rem;
        border-radius: 8px;
    }

    @media (max-width: 991px) {
        .profile-sidebar {
            border-right: none;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 20px;
        }
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-semibold"><i class="bi bi-person-check"></i> Profil Admin</h3>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-arrow-return-left"></i> Dashboard
        </a>
    </div>

    <div class="profile-wrapper">
        <div class="profile-card row g-4">

            <!-- Kiri -->
            <div class="col-lg-4 profile-sidebar">
                <div class="profile-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h4 class="profile-name">{{ $user['name'] ?? 'Administrator' }}</h4>
                <p class="profile-role">Administrator Sistem</p>

                <button class="btn btn-primary btn-sm mt-2">
                    <i class="bi bi-pencil-square"></i> Edit Profil
                </button>
            </div>

            <!-- Kanan -->
            <div class="col-lg-8">
                
                <div class="info-section mb-4">
                    <h5><i class="bi bi-info-circle"></i> Informasi Akun</h5>
                    <ul class="info-list">
                        <li>
                            <span class="info-label">Email</span>
                            <span class="info-value">{{ $user['email'] ?? '-' }}</span>
                        </li>
                        <li>
                            <span class="info-label">Bergabung</span>
                            <span class="info-value">{{ $user['created_at']->format('d M Y') ?? '-' }}</span>
                        </li>
                        <li>
                            <span class="info-label">Terakhir Login</span>
                            <span class="info-value">{{ $user['updated_at']->format('d M Y, H:i') ?? '-' }}</span>
                        </li>
                    </ul>
                </div>

                <div class="info-section">
                    <h5><i class="bi bi-shield-check"></i> Status Akun</h5>
                    <ul class="info-list">
                        <li>
                            <span class="info-label">Status</span>
                            <span class="info-value">
                                <span class="badge bg-success badge-status">
                                    ✅ Aktif
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="info-label">Role</span>
                            <span class="info-value">Administrator</span>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
