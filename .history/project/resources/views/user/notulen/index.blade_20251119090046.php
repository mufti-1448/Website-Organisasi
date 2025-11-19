@extends('user.layouts.app')

@section('title', 'Notulen')

@section('content')

    <style>
        .hero-section {
            background: #0d6efd;
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .search-wraper input {
            height: 48px;
            border-radius: 8px;
            padding-left: 40px;
            padding-right: 40px;
        }

        .search-wraper {
            position: relative;
        }

        .search-wraper i {
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

        .notulen-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            border: none;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: .25s;
            height: 100%;
        }

        .notulen-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .program-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a1a1a;
            text-align: left !important;
            /* memastikan rata kiri */
            word-break: break-word;
            /* mencegah nabrak */
            white-space: normal;
            /* biar bisa multi-line */
        }


        .badge-status {
            font-size: 0.75rem;
            padding: 5px 10px;
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

        .notulen-info {
            color: #4a5568;
            /* abu-abu */
            font-size: 0.95rem;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .notulen-footer {
            background: #f8fafc;
            padding: 14px 20px;
            border-radius: 0 0 16px 16px;
            margin: 0 -24px -24px -24px;
            text-align: left;
        }

        .btn-status-footer {
            background: #d1f7d6;
            color: #0f8f2f;
            border-radius: 20px;
            padding: 6px 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
    </style>

    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold mb-2">Notulen</h1>
            <p class="lead mb-0">Informasi Lengkap Notulen Dewan Ambalan</p>
        </div>
    </section>

    <section class="py-4">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('user.notulen.index') }}" method="GET" class="col-md-5">
                <div class="search-wraper">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari notulen..."
                        value="{{ request('search') }}">
                    @if (request('search'))
                        <a href="{{ route('user.notulen.index') }}" class="clear-search-btn" title="Clear search">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    @if (request('search'))
        <div class="text-center mb-3">
            <small class="text-muted">
                Menampilkan {{ $notulen->count() }} dari {{ $notulen->total() }} hasil untuk
                "{{ request('search') }}"
            </small>
        </div>
    @endif

    <section class="py-4">
        <div class="container text-center">
            <di class="row g-4">

                @forelse ($notulen as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="notulen-card  shadow-lg" onclick="window.location='{{ route('user.notulen.show', $data->id) }}'">

                            <div class="position-relative mb-3">
                                <h5 class="program-title text-start pe-5">
                                    {{ $data->judul }}
                                </h5>
                            </div>

                            <p class="notulen-info">
                                <i class="bi bi-person-circle text-primary"></i>
                                {{ $data->penulis->name }}
                            </p>
                            <!-- Tanggal -->
                            <p class="notulen-info">
                                <i class="bi bi-calendar-event text-primary"></i>
                                {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}
                            </p>

                            <p class="notulen-info">
                                <i class="bi bi-people-fill text-primary"></i>
                                {{ $data->notulen->judul }}
                            </p>
                            <!-- Deskripsi (opsional jika ada) -->
                            @if ($data->deskripsi)
                                <p class="notulen-info">
                                    <i class="bi bi-info-circle text-primary"></i>
                                    {{ $data->deskripsi }}
                                </p>
                            @endif

                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-folder-x display-1 text-muted"></i>
                            <h5 class="text-muted mt-3">Belum ada notulen</h5>
                            <p class="text-muted">notulen akan muncul di sini setelah ditambahkan oleh admin.</p>
                        </div>
                    </div>
                @endforelse


                @if ($notulen->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $notulen->appends(request()->query())->links() }}
                    </div>
                @endif
            </di>
        </div>
    </section>
@endsection
