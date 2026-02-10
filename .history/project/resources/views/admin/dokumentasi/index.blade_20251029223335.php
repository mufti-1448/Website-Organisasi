@extends('admin.layouts.app')

@section('content')
    <style>
                /* Title & Page Section */
        .page-title {
            font-size: 24px;
            font-weight: 700;
        }
        .doc-card {
            border: 1px solid #e0e0e0;
            border-left: 4px solid #0d6efd;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .doc-card img {
            height: 180px;
            object-fit: cover;
            width: 100%;
            border-radius: 10px 10px 0 0;
        }

        /* Konten jadi flex dan tombol selalu ke bawah */
        .doc-card .card-body {
            display: flex;
            flex-direction: column;
        }

        .doc-card .card-body .action-buttons {
            margin-top: auto;
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="page-title mb-1">Data Dokumentasi</h4>
                <small class="text-muted">Kelola data dokumentasi Dewan Ambalan</small>
            </div>
            <a href="{{ route('dokumentasi.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle"></i> Tambah Dokumentasi
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @forelse ($dokumentasis as $item)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card shadow-sm border-0 doc-card">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top rounded-top">
                        @else
                            <div class="bg-secondary text-white text-center py-5 rounded-top">
                                Tidak ada foto
                            </div>
                        @endif

                        <div class="card-body">
                            <h6 class="fw-bold mb-2">{{ $item->judul }}</h6>
                            <p class="text-muted small mb-2">{{ Str::limit($item->deskripsi, 50) }}</p>

                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $item->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <div class="d-flex gap-1">
                                    <a href="{{ route('dokumentasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modalDeleteLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow-sm">

                                                <!-- Icon & Title Section -->
                                                <div class="text-center pt-4 pb-2">
                                                    <i class="bi bi-trash3 text-danger" style="font-size: 3rem;"></i>
                                                    <h5 class="mt-3 fw-semibold">Hapus Data?</h5>
                                                </div>

                                                <div class="modal-body text-center text-muted">
                                                    Data <strong>{{ $item->judul }}</strong> akan dihapus secara permanen.
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="modal-footer border-0 justify-content-center pb-4 gap-2">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Batal</button>

                                                    <form action="{{ route('dokumentasi.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger px-4">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-folder2-open fs-1"></i>
                    <p>Belum ada dokumentasi</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Modal --}}
    @foreach ($dokumentasis as $item)
        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Dokumentasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ $item->judul }}</h5>
                        <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                        <p><strong>Kategori:</strong> {{ $item->kategori ?? '-' }}</p>
                        <p>{{ $item->deskripsi }}</p>

                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded shadow">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
