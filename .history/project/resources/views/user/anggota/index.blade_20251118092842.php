@extends('user.layouts.app')

@section('title', 'Anggota')

@section('content')

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border-radius: 0;
        }

        .organisation-section {
            background: #f8f9fc;
        }

        .org-card {
            background: #f8f9fc;
            border-radius: 12px;
            transition: 0.3s ease;
        }

        .org-card:hover {
            box-shadow: 0 4px 20px rgba(13, 110, 253, 0.2);
            transform: translateY(-5px);
        }

        .org-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
        }

        .search-wrapper .form-control {
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        .search-wrapper .btn-primary {
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }

        .search-wrapper .btn-outline-secondary {
            border-radius: 50%;
            padding: 10px;
        }

        .search-input:focus {
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
        }

        .input-group .form-control {
            padding-left: 20px;
            height: 48px;
            font-size: 0.95rem;
        }

        .input-group .btn {
            height: 48px;
        }
    </style>

    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-3">Daftar Anggota</h1>
            <p class="lead">Berikut adalah daftar anggota Dewan Ambalan yang aktif berpartisipasi dalam kegiatan organisasi
            </p>
        </div>
    </section>

    <section class="organisation-section py-5">
        <div class="container">
            <h3 class="text-center fw-bold mb-4">Daftar Anggota</h3>
            <div class="section-line mx-auto mb-5"></div>

            <!-- Search Bar -->
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">

                    <form method="GET" action="{{ route('user.anggota.index') }}" class="search-wrapper d-flex">

                        <div class="input-group shadow-sm">
                            <input type="text" name="search" class="form-control search-input"
                                placeholder="Cari nama, jabatan, atau kelas..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-search"></i>
                            </button>
                            @if (request('search'))
                                <a href="{{ route('user.anggota.index') }}" class="btn btn-outline-secondary px-3">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>


            <!-- Results Info -->
            @if (request('search'))
                <div class="text-center mb-3">
                    <small class="text-muted">
                        Menampilkan {{ $anggota->count() }} dari {{ $anggota->total() }} hasil untuk
                        "{{ request('search') }}"
                    </small>
                </div>
            @endif

            <div class="row g-4 justify-content-center">
                @forelse ($anggota as $item)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="org-card text-center shadow-lg p-4">
                            @if ($item->foto)
                                <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}" class="org-img"
                                    alt="{{ $item->nama }}">
                            @else
                                <i class="bi bi-person-circle text-secondary fs-2"></i>
                            @endif
                            <h5 class="mt-3 mb-1">{{ $item->nama }}</h5>
                            <p class="text-muted small mb-1">{{ $item->kelas }}</p>
                            <p class="text-muted small mb-1 badge bg-primary">{{ $item->jabatan }}</p>
                            <p class="text-muted small mb-1">{{ $item->kontak }}</p>
                            <p class="text-muted small mb-1">{{ $item->email }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            @if (request('search'))
                                Tidak ada anggota yang ditemukan untuk "{{ request('search') }}"
                            @else
                                Belum ada data anggota.
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($anggota->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $anggota->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection
