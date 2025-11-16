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
            @forelse($programKerja as $program)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 36px; height: 36px;">
                                    <i class="bi bi-list-task-fill fs-5"></i>
                                </div>
                                <span
                                    class="badge ms-auto
                                    @if ($program->status == 'selesai') bg-secondary-subtle text-secondary border border-secondary
                                    @elseif($program->status == 'berlangsung') bg-success-subtle text-success border border-success
                                    @else bg-warning-subtle text-warning border border-warning @endif">
                                    @if ($program->status == 'selesai')
                                        Selesai
                                    @elseif($program->status == 'berlangsung')
                                        Sedang Berjalan
                                    @else
                                        Direncanakan
                                    @endif
                                </span>
                            </div>
                            <h5 class="fw-semibold mb-2">{{ $program->nama }}</h5>
                            <p class="text-muted mb-3">
                                {{ $program->deskripsi ?: 'Program kerja organisasi Dewan Ambalan.' }}
                            </p>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-calendar-event me-2"></i>
                                @if ($program->target_date)
                                    {{ \Carbon\Carbon::parse($program->target_date)->translatedFormat('j F Y') }}
                                @else
                                    Tanggal belum ditentukan
                                @endif
                            </div>
                            @if ($program->penanggungJawab)
                                <div class="d-flex align-items-center text-muted small mt-2">
                                    <i class="bi bi-person me-2"></i>
                                    Penanggung Jawab: {{ $program->penanggungJawab->nama }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Belum ada program kerja yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
