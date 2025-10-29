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
        <h3 class="mb-3"><i class="bi bi-envelope-open"></i> Detail Pesan</h3>

        <div class="detail-container">
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $pesan->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $pesan->email }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" value="{{ $pesan->tanggal }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" disabled>
                            <option value="belum" {{ $pesan->status == 'belum' ? 'selected' : '' }}>Baru</option>
                            <option value="berlangsung" {{ $pesan->status == 'berlangsung' ? 'selected' : '' }}>Dibaca</option>
                            <option value="selesai" {{ $pesan->status == 'selesai' ? 'selected' : '' }}>Dibalas</option>
                        </select>
                    </div>
                    <div class="col-md-12">
