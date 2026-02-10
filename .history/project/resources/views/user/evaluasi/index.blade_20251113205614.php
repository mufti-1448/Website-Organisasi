@extends('user.layouts.app')

@section('title', 'Evaluasi')

@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-2"><i class="bi bi-graph-up text-info me-2"></i>Evaluasi Program</h2>
                <p class="text-muted">Hasil evaluasi dan penilaian terhadap program-program yang telah dilaksanakan</p>
            </div>
        </div>

        @if ($evaluasi->count())
            <div class="row g-4">
                @foreach ($evaluasi as $item)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100 hover-shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title">{{ $item->programKerja->nama ?? 'Program Umum' }}</h5>
                                    <span class="badge bg-info">
                                        <i class="bi bi-graph-up me-1"></i>{{ $item->nilai ?? 'N/A' }}/100
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2"><strong>Status:</strong></small>
                                    <span
                                        class="badge
                                    @if ($item->status == 'sangat_baik') bg-success
                                    @elseif($item->status == 'baik') bg-info
                                    @elseif($item->status == 'cukup') bg-warning
                                    @else bg-danger @endif">
                                        {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1"><i
                                            class="bi bi-calendar-event me-1"></i><strong>Tanggal Evaluasi:</strong></small>
                                    <p class="small mb-0">
                                        {{ \Carbon\Carbon::parse($item->tanggal_evaluasi)->translatedFormat('j F Y') }}</p>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1"><strong>Keterangan:</strong></small>
                                    <p class="small text-muted">{{ $item->keterangan ?: 'Tidak ada keterangan' }}</p>
                                </div>

                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $item->nilai ?? 0 }}%"
                                        aria-valuenow="{{ $item->nilai ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-2"></i>Belum ada data evaluasi
            </div>
        @endif
    </div>

    <style>
        .hover-shadow {
            transition: box-shadow 0.3s ease;
        }

        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
    </style>
@endsection
