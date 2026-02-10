@extends('admin.layouts.app')

@section('content')
    <style>
        .message-card {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            border: none;
        }

        .incoming-message {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #0d6efd;
        }

        .reply-message {
            background: linear-gradient(135deg, #e7f3ff 0%, #d1ecf1 100%);
            border-left: 4px solid #198754;
        }

        .message-header {
            font-weight: 600;
            color: #495057;
        }

        .message-content {
            line-height: 1.6;
            color: #212529;
        }

        .message-meta {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .action-buttons {
            gap: 10px;
        }

        .btn-custom {
            border-radius: 8px;
            font-weight: 500;
        }
    </style>

    <div class="container mt-4">
        <h3 class="mb-4"><i class="bi bi-envelope-open text-primary me-2"></i>Detail Pesan</h3>

        <!-- Pesan Masuk -->
        <div class="card message-card incoming-message mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person-circle fs-4 text-primary me-3"></i>
                    <div>
                        <h5 class="message-header mb-1">{{ $pesan->nama }}</h5>
                        <small class="message-meta">{{ $pesan->email }}</small>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="badge bg-primary mb-2">{{ $pesan->tanggal }}</span>
                </div>
                <div class="message-content">
                    <strong>Pesan:</strong><br>
                    {{ $pesan->pesan }}
                </div>
            </div>
        </div>

        <!-- Balasan (jika ada) -->
        @if ($pesan->reply)
            <div class="card message-card reply-message mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-reply fs-4 text-success me-3"></i>
                        <div>
                            <h5 class="message-header mb-1">Balasan Admin</h5>
                            <small class="message-meta">
                                Dibalas pada: {{ $pesan->replied_at ? $pesan->replied_at->format('d M Y H:i') : '-' }}
                            </small>
                        </div>
                    </div>
                    <div class="message-content">
                        <strong>Balasan:</strong><br>
                        {{ $pesan->reply }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="d-flex action-buttons">
            <a href="{{ route('kontak.reply', $pesan->id) }}" class="btn btn-primary btn-custom">
                <i class="bi bi-reply me-1"></i>Balas Pesan
            </a>
            <a href="{{ route('kontak.index') }}" class="btn btn-secondary btn-custom">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>
@endsection
