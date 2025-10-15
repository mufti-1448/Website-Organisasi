@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-envelope"></i> Pesan Masuk</h3>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontak as $k)
            <tr>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>
                    <span class="badge {{ $k->status === 'baru' ? 'bg-warning' : 'bg-success' }}">
                        {{ ucfirst($k->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('kontak.show', $k->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="{{ route('kontak.reply', $k->id) }}" class="btn btn-sm btn-primary">Balas</a>
                    <form action="{{ route('kontak.destroy', $k->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pesan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="my-5">

    <h3><i class="bi bi-share"></i> Media Sosial</h3>
    <p>Kelola link media sosial organisasi.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMediaModal">Tambah Media Sosial</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Platform</th>
                <th>URL</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mediaSosial as $ms)
            <tr>
                <td>{{ $ms->nama_platform }}</td>
                <td><a href="{{ $ms->url }}" target="_blank">{{ $ms->url }}</a></td>
                <td>{{ $ms->icon }}</td>
                <td>
                    <span class="badge {{ $ms->aktif ? 'bg-success' : 'bg-secondary' }}">
                        {{ $ms->aktif ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editMediaModal{{ $ms->id }}">Edit</a>
                    <form action="{{ route('media_sosial.destroy', $ms->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus media sosial ini?')">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editMediaModal{{ $ms->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Media Sosial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('media_sosial.update', $ms->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_platform{{ $ms->id }}" class="form-label">Nama Platform</label>
                                    <input type="text" class="form-control" id="nama_platform{{ $ms->id }}" name="nama_platform" value="{{ $ms->nama_platform }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="url{{ $ms->id }}" class="form-label">URL</label>
                                    <input type="url" class="form-control" id="url{{ $ms->id }}" name="url" value="{{ $ms->url }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="icon{{ $ms->id }}" class="form-label">Icon (Bootstrap Icon)</label>
                                    <input type="text" class="form-control" id="icon{{ $ms->id }}" name="icon" value="{{ $ms->icon }}" placeholder="bi-facebook">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Aktif</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="aktif{{ $ms->id }}" name="aktif" value="1" {{ $ms->aktif ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif{{ $ms->id }}">
                                            Aktifkan
                                        </label>
                                    </div>
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
            @endforeach
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="addMediaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Media Sosial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('media_sosial.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_platform" class="form-label">Nama Platform</label>
                            <input type="text" class="form-control" id="nama_platform" name="nama_platform" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="url" class="form-control" id="url" name="url" required>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon (Bootstrap Icon)</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="bi-facebook">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aktif</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="aktif" name="aktif" value="1" checked>
                                <label class="form-check-label" for="aktif">
                                    Aktifkan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
