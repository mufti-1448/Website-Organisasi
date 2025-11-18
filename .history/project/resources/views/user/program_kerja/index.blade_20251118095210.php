@extends('user.layouts.app')

@section('title', 'Program Kerja')

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

        .program-card {
            background: white;
            border: 1px solid #e7e9ee;
            border-radius: 14px;
            padding: 20px;
            transition: .25s;
            height: 100%;
        }

        .program-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.06);
        }

        .badge-status {
            font-size: 0.75rem;
            padding: 4px 8px;
            border-radius: 30px;
        }

        .badge-berjalan {
            background: #d1f7d6;
            color: #0f8f2f;
        }

        .badge-direncanakan {
            background: #dce8ff;
            color: #0d42ff;
        }

        .badge-selesai {
            background: #e8e8e8;
            color: #555;
        }

        .program-title {
            font-weight: 700;
            font-size: 1.05rem;
        }

        .program-desc {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .program-author {
            font-size: 0.85rem;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .program-author i {
            font-size: 0.9rem;
        }
    </style>

    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold mb-2">Program Kerja</h1>
            <p class="lead mb-0">Daftar program kerja Dewan Ambalan untuk mencapai tujuan organisasi</p>
        </div>
    </section>

    <!-- SEARCH -->
    <section class="py-4">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('user.programKerja.index') }}" method="GET" class="col-md-5">
                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari program kerja..."
                        value="{{ request('search') }}">
                </div>
            </form>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="py-4">
        <div class="container text-center">
            <h4 class="fw-bold mb-1">Daftar Program</h4>
            <p class="text-muted mb-4">Program kerja yang sedang berjalan dan telah selesai dilaksanakan</p>

            <div class="row g-4">

                @forelse ($programKerja as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="program-card">

                            <!-- TITLE & STATUS -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="program-title">{{ $data->judul }}</h5>

                                @php
                                    $statusClass = match ($data->status) {
                                        'Berjalan' => 'badge-berjalan',
                                        'Direncanakan' => 'badge-direncanakan',
                                        'Selesai' => 'badge-selesai',
                                        default => 'badge-secondary',
                                    };
                                @endphp

                                <span class="badge-status {{ $statusClass }}">{{ $data->status }}</span>
                            </div>

                            <!-- DESC -->
                            <p class="program-desc">{{ $data->deskripsi }}</p>

                            <!-- AUTHOR -->
                            <p class="program-author">
                                <i class="bi bi-person-fill"></i> {{ $data->penanggung_jawab }}
                            </p>

                        </div>
                    </div>

                @empty
                    <div class="col-12 mt-4">
                        <p class="text-muted">Belum ada program kerja.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
