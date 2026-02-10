@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> --}}
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Pengaturan Website</h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="pengaturanTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pengaturan-tab" data-bs-toggle="tab"
                            data-bs-target="#pengaturan" type="button" role="tab">Pengaturan Web</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="carousel-tab" data-bs-toggle="tab" data-bs-target="#carousel"
                            type="button" role="tab">Carousel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil"
                            type="button" role="tab">Profil Organisasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tentang-tab" data-bs-toggle="tab" data-bs-target="#tentang"
                            type="button" role="tab">Tentang Kami</button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" id="pengaturanTabContent">
                    <!-- Pengaturan Web Tab -->
                    <div class="tab-pane fade show active" id="pengaturan" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5>Pengaturan Web</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('pengaturan-web.update', $pengaturan->id ?? '') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama_organisasi" class="form-label">Nama Organisasi</label>
                                                <input type="text" class="form-control" id="nama_organisasi"
                                                    name="nama_organisasi"
                                                    value="{{ old('nama_organisasi', $pengaturan->nama_organisasi ?? '') }}"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Logo</label>
                                                <input type="file" class="form-control" id="logo" name="logo"
                                                    accept="image/*">
                                                @if ($pengaturan && $pengaturan->logo)
                                                    <img src="{{ asset('storage/' . $pengaturan->logo) }}" alt="Logo"
                                                        class="mt-2" style="max-width: 100px;">
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="favicon" class="form-label">Favicon</label>
                                                <input type="file" class="form-control" id="favicon" name="favicon"
                                                    accept="image/*">
                                                @if ($pengaturan && $pengaturan->favicon)
                                                    <img src="{{ asset('storage/' . $pengaturan->favicon) }}" alt="Favicon"
                                                        class="mt-2" style="max-width: 50px;">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pengaturan->alamat ?? '') }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="facebook" class="form-label">Facebook</label>
                                                <input type="url" class="form-control" id="facebook"
                                                    name="facebook"
                                                    value="{{ old('facebook', $pengaturan->facebook ?? '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="instagram" class="form-label">Instagram</label>
                                                <input type="url" class="form-control" id="instagram"
                                                    name="instagram"
                                                    value="{{ old('instagram', $pengaturan->instagram ?? '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="youtube" class="form-label">YouTube</label>
                                                <input type="url" class="form-control" id="youtube" name="youtube"
                                                    value="{{ old('youtube', $pengaturan->youtube ?? '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp"
                                                    name="whatsapp"
                                                    value="{{ old('whatsapp', $pengaturan->whatsapp ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Tab -->
                    <div class="tab-pane fade" id="carousel" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Carousel</h5>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addCarouselModal">
                                    <i class="bi bi-plus"></i> Tambah Carousel
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($carousels as $carousel)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ asset('storage/' . $carousel->gambar) }}"
                                                    class="card-img-top" alt="Carousel"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ $carousel->judul }}</h6>
                                                    <p class="card-text">{{ Str::limit($carousel->deskripsi, 50) }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editCarouselModal{{ $carousel->id }}">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </button>
                                                        <form
                                                            action="{{ route('pengaturan-web.destroyCarousel', $carousel->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus carousel ini?')">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editCarouselModal{{ $carousel->id }}"
                                            tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Carousel</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('pengaturan-web.updateCarousel', $carousel->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="judul{{ $carousel->id }}"
                                                                    class="form-label">Judul</label>
                                                                <input type="text" class="form-control"
                                                                    id="judul{{ $carousel->id }}" name="judul"
                                                                    value="{{ $carousel->judul }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi{{ $carousel->id }}"
                                                                    class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" id="deskripsi{{ $carousel->id }}" name="deskripsi" rows="3" required>{{ $carousel->deskripsi }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gambar{{ $carousel->id }}"
                                                                    class="form-label">Gambar</label>
                                                                <input type="file" class="form-control"
                                                                    id="gambar{{ $carousel->id }}" name="gambar"
                                                                    accept="image/*">
                                                                <small class="form-text text-muted">Biarkan kosong jika
                                                                    tidak ingin mengubah gambar</small>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profil Organisasi Tab -->
                    <div class="tab-pane fade" id="profil" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5>Profil Organisasi</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('pengaturan-web.updateProfil') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nama_organisasi_profil" class="form-label">Nama Organisasi</label>
                                        <input type="text" class="form-control" id="nama_organisasi_profil"
                                            name="nama_organisasi"
                                            value="{{ old('nama_organisasi', $profil->nama_organisasi ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="visi" class="form-label">Visi</label>
                                        <textarea class="form-control" id="visi" name="visi" rows="3" required>{{ old('visi', $profil->visi ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="misi" class="form-label">Misi</label>
                                        <textarea class="form-control" id="misi" name="misi" rows="3" required>{{ old('misi', $profil->misi ?? '') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tentang Kami Tab -->
                    <div class="tab-pane fade" id="tentang" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5>Tentang Kami</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('pengaturan-web.updateTentang') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            value="{{ old('judul', $tentang->judul ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="konten" class="form-label">Konten</label>
                                        <textarea class="form-control" id="konten" name="konten" rows="6" required>{{ old('konten', $tentang->konten ?? '') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Carousel Modal -->
    <div class="modal fade" id="addCarouselModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Carousel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('pengaturan-web.storeCarousel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
