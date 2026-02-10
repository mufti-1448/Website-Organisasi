@extends('admin.layouts.app')

@section('content')
    <style>
        /* ===== Styling Basic ===== */
        .detail-container {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
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

        /* Return button */
        .btn-secondary {
            border-radius: 8px;
        }
    </style>

    <div class="container mt-4">
        <h3 class="mb-3"><i class="bi bi-reply"></i> Balas Pesan</h3>

        <div class="detail-container">
            <!-- Pesan Asli -->
            <div class="mb-4">
                <h5>Pesan dari: {{ $pesan->nama }}</h5>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $pesan->email }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" value="{{ $pesan->tanggal }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Pesan</label>
                        <textarea class="form-control" rows="4" readonly>{{ $pesan->pesan }}</textarea>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Form Balasan -->
            <div>
                <h5>Kirim Balasan</h5>
                <form action="{{ route('admin.kontak.sendReply', $pesan->id) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="subject" class="form-label">Subjek</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="col-md-12">
                            <label for="message" class="form-label">Pesan Balasan</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                    </div>
                    <div class="gap-3">
                        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-send"></i> Kirim Balasan</button>
                        <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
