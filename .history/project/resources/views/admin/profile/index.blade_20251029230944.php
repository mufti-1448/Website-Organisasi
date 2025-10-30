@extends('admin.layouts.app')

@section('title', 'Profil Admin')

@section('content')
    <style>
        .profile-wrapper {
            max-width: 900px;
            margin: 0 auto;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        .profile-sidebar {
            text-align: center;
            border-right: 1px solid #e9ecef;
            padding-right: 30px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
            border: 4px solid #fff;
        }

        .profile-avatar i {
            font-size: 3.5rem;
            color: #fff;
        }

        .profile-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 5px;
        }

        .profile-role {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .btn-edit-profile {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(13, 110, 253, 0.4);
            background: linear-gradient(135deg, #0b5ed7, #5c0fc8);
        }

        /* Right info section */
        .info-section h5 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-section h5 i {
            color: #0d6efd;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f1f3f4;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-list li:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 0.95rem;
            color: #6c757d;
            font-weight: 500;
        }

        .info-value {
            font-size: 0.95rem;
            color: #212529;
            font-weight: 600;
        }

        .badge-status {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 20px;
            font-weight: 600;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 0;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
            margin-top: 5px;
        }

        @media (max-width: 991px) {
            .profile-sidebar {
                border-right: none;
                border-bottom: 1px solid #e9ecef;
                margin-bottom: 30px;
                padding-right: 0;
                padding-bottom: 30px;
            }

            .profile-card {
                padding: 20px;
            }
        }
    </style>

    <div class="container mt-4">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="bi bi-person-check me-2"></i>Profil Admin</h1>
                <p class="page-subtitle">Kelola informasi profil administrator</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-return-left me-1"></i>Dashboard
            </a>
        </div>

        <div class="profile-wrapper">
            <div class="profile-card row g-4">

                <!-- Sidebar -->
                <div class="col-lg-4 profile-sidebar">
                    <div class="profile-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h4 class="profile-name">{{ $user['name'] ?? 'Administrator' }}</h4>
                    <p class="profile-role">Administrator Sistem</p>
                    
                </div>

                <!-- Main Content -->
                <div class="col-lg-8">

                    <div class="info-section mb-4">
                        <h5><i class="bi bi-info-circle"></i>Informasi Akun</h5>
                        <ul class="info-list">
                            <li>
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ $user['email'] ?? '-' }}</span>
                            </li>
                            <li>
                                <span class="info-label">Bergabung</span>
                                <span
                                    class="info-value">{{ $user['created_at'] ? $user['created_at']->format('d M Y') : '-' }}</span>
                            </li>
                            <li>
                                <span class="info-label">Terakhir Login</span>
                                <span
                                    class="info-value">{{ $user['updated_at'] ? $user['updated_at']->format('d M Y, H:i') : '-' }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="info-section">
                        <h5><i class="bi bi-shield-check"></i>Status Akun</h5>
                        <ul class="info-list">
                            <li>
                                <span class="info-label">Status</span>
                                <span class="info-value">
                                    <span class="badge bg-success badge-status">
                                        <i class="bi bi-check-circle-fill me-1"></i>Aktif
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
