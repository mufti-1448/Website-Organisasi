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

        .badge-jabatan {
            font-size: 0.75rem;
            padding: 4px 8px;
            border-radius: 30px;
            font-weight: 600;
        }

        .badge-ketua {
            background: #d63031;
        }

        .badge-wakil-ketua {
            background: #fdcb6e;
            color: #e17055;
        }

        .badge-sekretaris {
            background: #e17055;
            color: #ffffff;
        }

        .badge-bendahara {
            background: #6c5ce7;
            color: #ffffff;
        }

        .badge-koordinator {
            background: #a29bfe;
            color: #2d3436;
        }

        .badge-anggota {
            background: #b2bec3;
            color: #2d3436;
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
                            @if ($item->foto)
                                <img src="{{ asset('storage/uploads/anggota/' . $item->foto) }}" class="org-img"
                                    alt="{{ $item->nama }}">
                            @else
                                <i class="bi bi-person-circle text-secondary fs-2"></i>
                            @endif
                            <h5 class="mt-3 mb-1">{{ $item->nama }}</h5>
                            <p class="text-muted small mb-1">{{ $item->kelas }}</p>
                            <p
                                class="text-muted small mb-1 badge badge-jabatan @php
$jabatanClass = 'badge-anggota'; // default
                                switch (strtolower($item->jabatan)) {
                                    case 'ketua':
                                        $jabatanClass = 'badge-ketua';
                                        break;
                                    case 'wakil ketua':
                                        $jabatanClass = 'badge-wakil-ketua';
                                        break;
                                    case 'sekretaris':
                                        $jabatanClass = 'badge-sekretaris';
                                        break;
                                    case 'bendahara':
                                        $jabatanClass = 'badge-bendahara';
                                        break;
                                    case 'koordinator':
                                        $jabatanClass = 'badge-koordinator';
                                        break;
                                    case 'anggota':
                                        $jabatanClass = 'badge-anggota';
                                        break;
                                }
                                echo $jabatanClass; @endphp">
                                {{ $item->jabatan }}</p>
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
