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

        .reply-form-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
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

        .form-control-custom {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control-custom:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-custom {
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 20px;
        }

        .action-buttons {
            gap: 10px;
        }
    </style>

    <div class="container mt-4">
        <h3 class="mb-4"><i class="bi bi-reply text-success me-2"></i>Balas Pesan</h3>

        <!-- Pesan Asli -->
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
                    <span class="badge bg-primary">{{ $pesan->tanggal }}</span>
                </div>
                <div class="message-content">
                    <strong>Pesan:</strong><br>
                    {{ $pesan->pesan }}
                </div>
            </div>
        </div>

        <!-- Form Balasan -->
        <div class="card message-card reply-form-card">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-send fs-4 text-success me-3"></i>
                    <h5 class="message-header mb-0">Kirim Balasan</h5>
                </div>

                <form action="{{ route('kontak.sendReply', $pesan->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-semibold">Subjek Email</label>
                        <input type="text" class="form-control form-control-custom" id="subject" name="subject"
                            placeholder="Masukkan subjek email balasan" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label fw-semibold">Pesan Balasan</label>
                        <textarea class="form-control form-control-custom" id="message" name="message" rows="6"
                            placeholder="Tulis pesan balasan Anda di sini..." required></textarea>
                    </div>
                    <div class="d-flex action-buttons">
                        <button type="submit" class="btn btn-success btn-custom">
                            <i class="bi bi-send me-1"></i>Kirim Balasan
                        </button>
                        <a href="{{ route('kontak.index') }}" class="btn btn-secondary btn-custom">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
