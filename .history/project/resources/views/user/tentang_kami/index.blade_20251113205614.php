@extends('user.layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="container py-5">
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">Tentang Kami</h1>
                <p class="lead text-muted">Mengenal lebih dekat Dewan Ambalan SMK Syafii Akrom</p>
            </div>
        </div>

        <!-- Tentang Organisasi -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <h2 class="fw-bold mb-3">Profil Organisasi</h2>
                <p class="text-muted mb-3">
                    Dewan Ambalan SMK Syafii Akrom adalah organisasi yang terdiri dari anggota-anggota terpilih yang
                    berkomitmen
                    untuk mengembangkan potensi diri dan berkontribusi pada kemajuan sekolah serta masyarakat sekitar.
                </p>
                <p class="text-muted">
                    Organisasi ini berdiri sebagai wadah bagi siswa untuk mengembangkan kepemimpinan, keterampilan,
                    dan karakter melalui berbagai program dan kegiatan yang bermakna.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3">Informasi Singkat</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>Nama:</strong> Dewan Ambalan SMK Syafii Akrom</li>
                            <li class="mb-2"><strong>Jenis:</strong> Organisasi Siswa Intra Sekolah</li>
                            <li class="mb-2"><strong>Berdiri:</strong> Tahun [Tahun Didirikan]</li>
                            <li class="mb-2"><strong>Anggota Aktif:</strong> {{ $totalAnggota ?? 0 }} orang</li>
                            <li class="mb-2"><strong>Status:</strong> Aktif</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi dan Misi -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #0d6efd;">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="bi bi-target text-primary me-2"></i>Visi</h5>
                        <p class="card-text text-muted">
                            Menjadi organisasi Dewan Ambalan yang unggul, inovatif, dan berkarakter dalam mengembangkan
                            potensi anggota serta berkontribusi positif bagi masyarakat.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #198754;">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="bi bi-bullseye text-success me-2"></i>Misi</h5>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Menyelenggarakan
                                program-program berkualitas</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Mengembangkan
                                kepemimpinan anggota</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Membangun kerjasama yang
                                solid</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai-nilai Inti -->
        <div class="row mb-5">
            <div class="col-12 mb-4">
                <h3 class="fw-bold mb-4">Nilai-nilai Inti</h3>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-hand-thumbs-up fs-2 text-primary mb-2"></i>
                        <h5 class="card-title">Integritas</h5>
                        <p class="card-text small text-muted">Menjunjung tinggi kejujuran dan tanggung jawab</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-people-fill fs-2 text-success mb-2"></i>
                        <h5 class="card-title">Solidaritas</h5>
                        <p class="card-text small text-muted">Bersatu dan saling mendukung</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-lightning-fill fs-2 text-warning mb-2"></i>
                        <h5 class="card-title">Inovasi</h5>
                        <p class="card-text small text-muted">Terus berinovasi dan berkembang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-heart-fill fs-2 text-danger mb-2"></i>
                        <h5 class="card-title">Dedikasi</h5>
                        <p class="card-text small text-muted">Berkomitmen penuh untuk kemajuan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div class="row">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Struktur Kepemimpinan</h3>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted mb-4">Dewan Ambalan dipimpin oleh anggota-anggota terbaik yang terpilih melalui
                            proses yang transparan dan demokratis.</p>
                        <div class="row">
                            <div class="col-md-4 mb-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-uppercase small">Ketua</h6>
                                    <p class="mb-0">Posisi kepemimpinan tertinggi</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-uppercase small">Wakil Ketua</h6>
                                    <p class="mb-0">Membantu ketua dalam menjalankan tugas</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-uppercase small">Sekretaris & Bendahara</h6>
                                    <p class="mb-0">Mengelola administrasi dan keuangan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
