@extends('user.layouts.app')

@section('title', 'Daftar Rapat')

@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-2"><i class="bi bi-calendar-event-fill text-success me-2"></i>Daftar Rapat</h2>
                <p class="text-muted">Informasi lengkap tentang rapat-rapat yang telah dan akan diadakan</p>
            </div>
        </div>

        @if ($rapat->count())
            <div class="row g-4">
                @foreach ($rapat as $item)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100 hover-shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <span class="badge bg-success">{{ $item->status ?? 'Selesai' }}</span>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1"><i
                                            class="bi bi-calendar-event me-1"></i><strong>Tanggal:</strong></small>
                                    <p class="small">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y H:i') }}</p>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1"><i
                                            class="bi bi-geo-alt-fill me-1"></i><strong>Tempat:</strong></small>
                                    <p class="small">{{ $item->tempat }}</p>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1"><i
                                            class="bi bi-bookmark-fill me-1"></i><strong>Agenda:</strong></small>
                                    <p class="small">{{ $item->agenda ?: 'Tidak ada keterangan' }}</p>
                                </div>

                                @if ($item->catatan)
                                    <div>
                                        <small class="text-muted d-block mb-1"><i
                                                class="bi bi-file-text me-1"></i><strong>Catatan:</strong></small>
                                        <p class="small">{{ $item->catatan }}</p>
                                    </div>
                                @endif

                                @if (route('user.notulen.index'))
                                    <a href="{{ route('user.notulen.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="bi bi-file-earmark-text me-1"></i>Lihat Notulen
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-2"></i>Belum ada data rapat
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
