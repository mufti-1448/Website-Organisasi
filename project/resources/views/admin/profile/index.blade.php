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

        .btn-logout {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
            background: linear-gradient(135deg, #c82333, #a02622);
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

    <div class="container mt-2">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title"><i class="bi bi-person-check me-2"></i>Profil Admin</h1>
                <p class="page-subtitle">Kelola informasi profil administrator</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>

        <div class="profile-wrapper">
            <div class="profile-card row g-4">

                <!-- Sidebar -->
                <div class="col-lg-4 profile-sidebar">
                    <div class="profile-avatar">
                        @if ($user->photo)
                            <img src="{{ asset($user->photo) }}" alt="Profile Photo"
                                class="w-100 h-100 rounded-circle object-fit-cover">
                        @else
                            <i class="bi bi-person-fill"></i>
                        @endif
                    </div>
                    <h4 class="profile-name">{{ $user['name'] ?? 'Administrator' }}</h4>
                    <p class="profile-role">Administrator Sistem</p>

                    <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-logout w-70">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </form>
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

                    <!-- Edit Profile Button -->
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil-square me-1"></i>Edit Profil
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">
                        <i class="bi bi-pencil-square me-2"></i>Edit Profil
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>Profil berhasil diperbarui!
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="photo" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB.</div>
                                @error('photo')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
