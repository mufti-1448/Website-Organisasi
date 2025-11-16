@extends('user.layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
                <p class="lead text-muted">Kami siap menerima pertanyaan, saran, dan masukan dari Anda</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Formulir Kontak -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Form Kontak</h5>
                        <form method="POST" action="#">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control border-0 bg-light" id="nama" name="nama"
                                    required placeholder="Masukkan nama Anda">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border-0 bg-light" id="email" name="email"
                                    required placeholder="Masukkan email Anda">
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="tel" class="form-control border-0 bg-light" id="telepon" name="telepon"
                                    placeholder="Masukkan nomor telepon">
                            </div>

                            <div class="mb-3">
                                <label for="subjek" class="form-label">Subjek</label>
                                <input type="text" class="form-control border-0 bg-light" id="subjek" name="subjek"
                                    required placeholder="Subjek pesan Anda">
                            </div>

                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control border-0 bg-light" id="pesan" name="pesan" rows="5" required
                                    placeholder="Ketik pesan Anda di sini..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send me-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Informasi Kontak -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="card-title mb-3">
                            <i class="bi bi-geo-alt-fill text-primary me-2"></i>Alamat
                        </h6>
                        <p class="small text-muted">
                            SMK Syafii Akrom<br>
                            Jl. Pendidikan No. 123<br>
                            Kota, Provinsi 12345
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="card-title mb-3">
                            <i class="bi bi-telephone-fill text-success me-2"></i>Telepon
                        </h6>
                        <p class="small text-muted">
                            <a href="tel:+62123456789" class="text-decoration-none">(0123) 456-789</a>
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="card-title mb-3">
                            <i class="bi bi-envelope-fill text-danger me-2"></i>Email
                        </h6>
                        <p class="small text-muted">
                            <a href="mailto:info@example.com" class="text-decoration-none">info@example.com</a>
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title mb-3">
                            <i class="bi bi-clock-fill text-info me-2"></i>Jam Operasional
                        </h6>
                        <p class="small text-muted">
                            Senin - Jumat: 07:00 - 16:00<br>
                            Sabtu - Minggu: Tutup
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <h6 class="mb-3">Ikuti Media Sosial Kami</h6>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-info rounded-circle">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-danger rounded-circle">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-success rounded-circle">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peta Lokasi (Optional) -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <h6 class="card-title p-4 mb-0">Lokasi Kami</h6>
                        <div
                            style="width: 100%; height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 0 0 0.25rem 0.25rem;">
                            <!-- Ganti dengan embed Google Maps atau Leaflet jika diperlukan -->
                            <div class="d-flex align-items-center justify-content-center h-100 text-white">
                                <div class="text-center">
                                    <i class="bi bi-geo-alt fs-1 mb-2"></i>
                                    <p>Peta lokasi dapat ditambahkan di sini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
