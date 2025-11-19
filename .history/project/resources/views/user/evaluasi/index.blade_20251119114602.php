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

        .evaluasi-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            border: none;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: .25s;
            height: 100%;
        }

        .evaluasi-card:hover {
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

        .evaluasi-info {
            color: #4a5568;
            /* abu-abu */
            font-size: 0.95rem;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .evaluasi-footer {
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

        .evaluasi-desc {
            font-size: 0.9rem;
            color: #6c757d;
            /* Clamp to 4 lines for WebKit/Blink browsers */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.4;
            /* Use em-based max-height so it scales with font-size */
            max-height: calc(1.4em * 4);
            /* ensure wrapping */
            text-align: left !important;
            /* memastikan rata kiri */
            word-break: break-word;
            /* mencegah nabrak */
            white-space: normal;
        }

        .truncate-title {
            max-width: 320px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }
    </style>

    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold mb-2">Evaluasi</h1>
            <p class="lead mb-0">Informasi Lengkap Evaluasi Dewan Ambalan</p>
        </div>
    </section>

    <section class="py-4">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('user.evaluasi.index') }}" method="GET" class="col-md-5">
                <div class="search-wraper">
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

    @if (request('search'))
        <div class="text-center mb-3">
            <small class="text-muted">
                Menampilkan {{ $evaluasi->count() }} dari {{ $evaluasi->total() }} hasil untuk
                "{{ request('search') }}"
            </small>
        </div>
    @endif

    <section class="py-4">
        <div class="container text-center">
            <di class="row g-4 justify-content-center">

                @forelse ($evaluasi as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="evaluasi-card  shadow-lg"
                            onclick="window.location='{{ route('user.evaluasi.show', $data->id) }}'">

                            <div class="position-relative mb-3">
                                <h5 class="program-title text-start truncate-title">
                                    {{ $data->judul }}
                                </h5>
                            </div>

                            <p class="evaluasi-info text-start truncate-title" style="max-width: 300px;">
                                <i class="bi bi-person-circle text-primary"></i>
                                {{ optional($data->penulisRelation)->nama ?? $data->penulis }}
                            </p>
                            <!-- Tanggal -->
                            <p class="evaluasi-info">
                                <i class="bi bi-calendar-event text-primary"></i>
                                {{ \Carbon\Carbon::parse($data->tanggal ?? ($data->tanggal_evaluasi ?? now()))->translatedFormat('d F Y') }}
                            </p>

                            <p class="evaluasi-info text-start truncate-title" style="max-width: 300px;">
                                <i class="bi bi-people-fill text-primary"></i>
                                {{ $data->judul }}
                            </p>
                            <!-- Deskripsi (opsional jika ada) -->
                            <p class="evaluasi-desc">{{ $data->isi }}</p>

                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-folder-x display-1 text-muted"></i>
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
            </di>
        </div>
    </section>
@endsection
