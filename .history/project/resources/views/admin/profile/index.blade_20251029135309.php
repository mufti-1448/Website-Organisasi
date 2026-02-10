@extends('admin.layouts.app')

@section('title', 'Profil Admin')

@section('content')
    <style>
        /* ===== Styling Basic ===== */
        .profile-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .profile-avatar i {
            font-size: 3rem;
            color: white;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 5px;
        }

        .profile-role {
            color: #6c757d;
            font-size: 0.95rem;
        }

        /* Form style */
        .form-control,
        .form-select {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.25);
        }

        label.form-label {
            font-weight: 600;
        }

        /* Info cards */
        .info-card {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .info-card h6 {
            color: #495057;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: 500;
            color: #6c757d;
        }

        .info-value {
            font-weight: 600;
            color: #212529;
        }
    </style>

    <div class="container mt-4">
        <h3 class="mb-4"><i class="bi bi-person-circle"></i> Profil Admin</h3>

        <div class="profile-container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h4 class="profile-name">{{ $user->name }}</h4>
                <p class="profile-role">Administrator</p>
            </div>

            <!-- Profile Information -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="info-card">
                        <h6><i class="bi bi-info-circle"></i> Informasi Akun</h6>

                        <div class="info-item">
                            <span class="info-label">Nama Lengkap:</span>
                            <span class="info-value">{{ $user->name }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Email:</span>
                            <span class="info-value">{{ $user->email }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Bergabung Sejak:</span>
                            <span
                                class="info-value">{{ $user->created_at ? $user->created_at->format('d M Y') : 'Tidak tersedia' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Terakhir Login:</span>
                            <span
                                class="info-value">{{ $user->updated_at ? $user->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}</span>
                        </div>
                    </div>

                    <div class="info-card">
                        <h6><i class="bi bi-shield-check"></i> Status Akun</h6>

                        <div class="info-item">
                            <span class="info-label">Status:</span>
                            <span class="info-value">
                                <span class="badge bg-success">Aktif</span>
                            </span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Role:</span>
                            <span class="info-value">Administrator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
