@extends('user.layouts.app')

@section('title', 'Evaluasi')

@section('content')

    <style>
        .hero-section {
            background: #0d6efd;
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .search-wrapper input {
            height: 48px;
            border-radius: 8px;
            padding-left: 40px;
            padding-right: 40px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .clear-search-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 15px;

        }
    </style>

    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold mb-2">Evaluasi</h1>
            <p class="lead mb-0">Daftar evaluasi kegiatan Dewan Ambalan</p>
        </div>
    </section>

    <!-- SEARCH -->
    <section class="py-4">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('user.evaluasi.index') }}" method="GET" class="col-md-5">
                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari evaluasi..."
                        value="{{ request('search') }}">
                    @if (request('search'))
                        <a href="{{ route('user.evaluasi.index') }}" class="clear-search-btn" title="Clear search">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="py-4">
        <div class="container text-center">
            <h4 class="fw-bold mb-1">Daftar Evaluasi</h4>
            <p class="text-muted mb-5">Evaluasi kegiatan yang telah dilaksanakan</p>

            <div class="row g-4">

                @forelse ($evaluasi as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->judul }}</h5>
                                <p class="card-text">{{ $data->deskripsi }}</p>
                                <p class="text-muted small">Tanggal: {{ $data->tanggal }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-clipboard-x display-1 text-muted"></i>
                            <h5 class="text-muted mt-3">Belum ada evaluasi</h5>
                            <p class="text-muted">Evaluasi akan muncul di sini setelah ditambahkan oleh admin.</p>
                        </div>
                    </div>
                @endforelse

                @if ($evaluasi->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $evaluasi->appends(request()->query())->links() }}
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
