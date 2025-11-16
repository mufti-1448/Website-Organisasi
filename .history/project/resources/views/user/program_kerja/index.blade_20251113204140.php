@extends('user.layouts.app')

@section('title', 'Program Kerja')

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h1 class="fw-bold mb-3">Program Kerja</h1>
                    <p class="text-muted fs-5">Berbagai program unggulan yang sedang berjalan dan akan datang</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- Pelatihan Kepemimpinan --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="bi bi-people-fill fs-5"></i>
                            </div>
                            <span class="badge bg-success-subtle text-success border border-success ms-auto">Sedang
                                Berjalan</span>
                        </div>
                        <h5 class="fw-semibold mb-2">Pelatihan Kepemimpinan</h5>
                        <p class="text-muted mb-3">
                            Program pengembangan soft skills dan leadership untuk meningkatkan kemampuan kepemimpinan
                            anggota.
                        </p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-2"></i> Oktober – November 2024
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bakti Sosial Ramadan --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="bi bi-heart-fill fs-5"></i>
                            </div>
                            <span
                                class="badge bg-primary-subtle text-primary border border-primary ms-auto">Direncanakan</span>
                        </div>
                        <h5 class="fw-semibold mb-2">Bakti Sosial Ramadan</h5>
                        <p class="text-muted mb-3">
                            Kegiatan berbagi dan peduli sesama melalui program bantuan sosial di bulan suci Ramadan.
                        </p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-2"></i> Maret 2025
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kompetisi Kreativitas --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-purple bg-opacity-10 text-purple rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="bi bi-trophy-fill fs-5"></i>
                            </div>
                            <span
                                class="badge bg-secondary-subtle text-secondary border border-secondary ms-auto">Selesai</span>
                        </div>
                        <h5 class="fw-semibold mb-2">Kompetisi Kreativitas</h5>
                        <p class="text-muted mb-3">
                            Lomba kreativitas antar anggota untuk mengasah kemampuan inovasi dan berpikir out of the
                            box.
                        </p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-2"></i> Agustus 2024
                        </div>
                    </div>
                </div>
            </div>

            {{-- Workshop Digital Marketing --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="bi bi-megaphone-fill fs-5"></i>
                            </div>
                            <span class="badge bg-warning-subtle text-warning border border-warning ms-auto">Sedang
                                Berjalan</span>
                        </div>
                        <h5 class="fw-semibold mb-2">Workshop Digital Marketing</h5>
                        <p class="text-muted mb-3">
                            Pelatihan keterampilan digital marketing untuk meningkatkan kemampuan promosi dan branding
                            organisasi.
                        </p>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-2"></i> September – Oktober 2024
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
