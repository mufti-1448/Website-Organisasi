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
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            border: 1px solid #ececec;
            transition: 0.2s;
        }

        .program-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        /* Title */
        .program-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1c1d1f;
            max-width: 75%;
        }

        /* Badges */
        .badge-status {
            padding: 4px 10px;
            font-size: 0.8rem;
            border-radius: 50px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-berjalan {
            background: #d8ffe7;
            color: #008f4a;
        }

        .badge-direncanakan {
            background: #fff3cd;
            color: #b37d00;
        }

        .badge-selesai {
            background: #dce4ff;
            color: #3457d5;
        }

        /* Description (3 lines max) */
        .program-desc {
            color: #6c757d;
            margin-top: 8px;
            margin-bottom: 14px;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* batasi 3 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Author */
        .program-author {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
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
            <form action="{{ route('user.program_kerja.index') }}" method="GET" class="col-md-5">
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
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="program-card shadow-sm">

                            <!-- TITLE & STATUS -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="program-title">{{ $data->nama }}</h5>

                                @php
                                    $statusClass = match ($data->status) {
                                        'berlangsung' => 'badge-berjalan',
                                        'belum' => 'badge-direncanakan',
                                        'selesai' => 'badge-selesai',
                                        default => 'badge-secondary',
                                    };

                                    $statusText = match ($data->status) {
                                        'berlangsung' => 'Berjalan',
                                        'belum' => 'Direncanakan',
                                        'selesai' => 'Selesai',
                                        default => 'Unknown',
                                    };
                                @endphp

                                <span class="badge-status {{ $statusClass }}">{{ $statusText }}</span>
                            </div>

                            <!-- DESCRIPTION -->
                            <div class="desc-box">
                                {{ strip_tags($data->deskripsi) }}
                            </div>


                            <!-- AUTHOR -->
                            <p class="program-author">
                                <i class="bi bi-person-fill"></i>
                                {{ $data->penanggungJawab->nama ?? 'Tidak ada' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-folder-x display-1 text-muted"></i>
                            <h5 class="text-muted mt-3">Belum ada program kerja</h5>
                            <p class="text-muted">Program kerja akan muncul di sini setelah ditambahkan oleh admin.</p>
                        </div>
                    </div>
                @endforelse


                @if ($programKerja->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $programKerja->appends(request()->query())->links() }}
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
