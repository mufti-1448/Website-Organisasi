@extends('user.layouts.app')

@section('title', 'Dokumentasi')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-2"><i class="bi bi-images text-warning me-2"></i>Galeri Dokumentasi</h2>
            <p class="text-muted">Koleksi foto dan dokumentasi kegiatan Dewan Ambalan</p>
        </div>
    </div>

    @if($dokumentasi->count())
        <div class="row g-3">
            @foreach($dokumentasi as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden hover-card">
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover hover-image" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{ $item->judul }}</h6>
                            @if($item->kategori)
                                <small class="badge bg-light text-dark">{{ $item->kategori }}</small>
                            @endif
                            @if($item->tanggal_dokumentasi)
                                <div class="small text-muted mt-2">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_dokumentasi)->translatedFormat('j F Y') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Lightbox Modal untuk melihat foto full -->
        <div class="modal fade" id="lightboxModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header border-0 bg-dark">
                        <h5 class="modal-title text-white" id="lightboxTitle"></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0 bg-dark">
                        <img id="lightboxImage" src="" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle me-2"></i>Belum ada dokumentasi
        </div>
    @endif
</div>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .hover-image {
        transition: transform 0.3s ease;
    }
    .hover-card:hover .hover-image {
        transform: scale(1.05);
    }
</style>

@if($dokumentasi->count())
    <script>
        document.querySelectorAll('.hover-card').forEach((card, index) => {
            card.addEventListener('click', function() {
                const img = this.querySelector('img');
                const title = this.querySelector('.card-title');
                document.getElementById('lightboxImage').src = img.src;
                document.getElementById('lightboxTitle').textContent = title.textContent;
                new bootstrap.Modal(document.getElementById('lightboxModal')).show();
            });
        });
    </script>
@endif
@endsection