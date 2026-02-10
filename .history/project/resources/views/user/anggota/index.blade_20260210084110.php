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
            cursor: pointer;
        }


        .org-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
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
            text-decoration: none;
        }

        .org-photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #e9ecef;
        }

        .org-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .org-photo i {
            font-size: 4rem;
            color: #adb5bd;
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

            <section class="py-4">
                <div class="container d-flex justify-content-center">
                    <form action="{{ route('user.anggota.index') }}" method="GET" class="col-md-5">
                        <div class="search-wrapper">
                            <i class="bi bi-search"></i>
                            <input type="text" name="search" class="form-control" placeholder="Cari anggota..."
                                value="{{ request('search') }}">
                            @if (request('search'))
                                <a href="{{ route('user.anggota.index') }}" class="clear-search-btn" title="Clear search">
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
                        Menampilkan {{ $anggota->count() }} dari {{ $anggota->total() }} hasil untuk
                        "{{ request('search') }}"
                    </small>
                </div>
            @endif

            <div class="row g-4 justify-content-center">
                @forelse ($anggota as $item)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="org-card text-center shadow-lg p-4" style="cursor: pointer"
                            onclick="window.location='{{ route('user.anggota.show', $item->id) }}'">
                            <div class="org-photo mx-auto">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}"
                                        alt="{{ $item->nama }}">
                                @else
                                    <i class="bi bi-person-circle"></i>
                                @endif
                            </div>
                            <h5 class="mt-3 mb-1 text-truncate" style="max-width: 250px;">
                                {{ $item->nama }}
                            </h5>
                            <p class="text-muted small mb-1">{{ $item->kelas }}</p>
                            <p
                                class="text-muted small mb-1 badge @php
$jabatanClass = match (strtolower($item->jabatan)) {
                                    'ketua' => 'bg-danger',
                                    'wakil ketua' => 'bg-warning',
                                    'sekretaris' => 'bg-success',
                                    'bendahara' => 'bg-primary',
                                    'koordinator' => 'bg-info',
                                    'anggota' => 'bg-secondary',
                                    default => 'bg-secondary',
                                };
                                echo $jabatanClass; @endphp">
                                {{ $item->jabatan }}</p>
                            <p class="text-muted small mb-1">{{ $item->kontak }}</p>
                            <p class="text-muted small mb-1">{{ $item->email }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-emoji-frown display-1 text-muted"></i>
                            <h5 class="text-muted mt-3">Belum ada anggota</h5>
                            <p class="text-muted">Anggota akan muncul di sini setelah ditambahkan oleh admin.</p>
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
