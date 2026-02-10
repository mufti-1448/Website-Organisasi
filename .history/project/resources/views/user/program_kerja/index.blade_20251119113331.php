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

        .program-card {
            background: white;
            border: 1px solid #e7e9ee;
            border-radius: 14px;
            padding: 15px;
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
            background: #b7b7b7;
            color: #565656;
        }

        .program-title {
            font-weight: 700;
            font-size: 1.05rem;
        }

        .program-desc {
            font-size: 0.9rem;
            color: #6c757d;
            /* Clamp to 4 lines for WebKit/Blink browsers */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.4;
            /* Use em-based max-height so it scales with font-size */
            max-height: calc(1.4em * 4);
            white-space: normal;
            /* ensure wrapping */
            word-break: break-word;
            text-align: left !important;

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
            <p class="lead mb-0">Daftar Program Kerja Dewan Ambalan untuk Mencapai Tujuan Organisasi</p>
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
                    @if (request('search'))
                        <a href="{{ route('user.program_kerja.index') }}" class="clear-search-btn" title="Clear search">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- Results Info -->
    @if (request('search'))
        <div class="text-center mb-3">
            <small class="text-muted">
                Menampilkan {{ $programKerja->count() }} dari {{ $programKerja->total() }} hasil untuk
                "{{ request('search') }}"
            </small>
        </div>
    @endif

    <!-- CONTENT -->
    <section class="py-4">
        <div class="container text-center">
            <div class="row g-4 justify-content-center">

                @forelse ($programKerja as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="program-card shadow-lg" style="cursor: pointer;"
                            onclick="window.location='{{ route('user.program_kerja.show', $data->id) }}'">
                            <!-- TITLE & STATUS -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="program-title text-start text-truncate" style="max-width: 250px">{{ $data->nama }}</h5>

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

                            <!-- DESC -->
                            <p class="program-desc">{{ $data->deskripsi }}</p>

                            <!-- AUTHOR -->
                            <p class="program-author mb-0 text-start text-truncate" style="max-width: 250px;">
                                <i class="bi bi-person-fill"></i> {{ $data->penanggungJawab->nama ?? 'Tidak ada' }}
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
