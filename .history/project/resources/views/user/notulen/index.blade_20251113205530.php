@extends('user.layouts.app')

@section('title', 'Notulen Rapat')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-2"><i class="bi bi-file-earmark-text text-primary me-2"></i>Notulen Rapat</h2>
            <p class="text-muted">Ringkasan dan dokumentasi hasil rapat-rapat Dewan Ambalan</p>
        </div>
    </div>

    @if($notulen->count())
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle">
                <thead class="table-light">
                    <tr>
                        <th><i class="bi bi-bookmark-fill"></i> Judul Rapat</th>
                        <th><i class="bi bi-person"></i> Penulis</th>
                        <th><i class="bi bi-calendar-event"></i> Tanggal Rapat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notulen as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->rapat->judul ?? 'Rapat Umum' }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($item->isi, 50) }}</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->anggota->foto)
                                        <img src="{{ asset('storage/' . $item->anggota->foto) }}" alt="{{ $item->anggota->nama }}" class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-light me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            <i class="bi bi-person-fill text-muted small"></i>
                                        </div>
                                    @endif
                                    <span>{{ $item->anggota->nama }}</span>
                                </div>
                            </td>
                            <td>
                                {{ $item->rapat->tanggal ? \Carbon\Carbon::parse($item->rapat->tanggal)->translatedFormat('j F Y') : 'Tanggal tidak tersedia' }}
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#notulenModal{{ $item->id }}">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal untuk melihat detail notulen -->
        @foreach($notulen as $item)
            <div class="modal fade" id="notulenModal{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header border-bottom">
                            <h5 class="modal-title">{{ $item->rapat->judul ?? 'Notulen Rapat' }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <strong>Penulis:</strong> {{ $item->anggota->nama }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal:</strong> {{ $item->rapat->tanggal ? \Carbon\Carbon::parse($item->rapat->tanggal)->translatedFormat('j F Y H:i') : 'Tidak tersedia' }}
                            </div>
                            @if($item->rapat->tempat)
                                <div class="mb-3">
                                    <strong>Tempat:</strong> {{ $item->rapat->tempat }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <strong>Isi Notulen:</strong>
                                <div class="alert alert-light border mt-2 p-3">
                                    {{ $item->isi }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle me-2"></i>Belum ada data notulen
        </div>
    @endif
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
</style>
@endsection