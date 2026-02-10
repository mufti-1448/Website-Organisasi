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
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus</button>
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

    <form action="{{ route('kontak.updateSosial') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h5>Facebook</h5>
                <div class="mb-3">
                    <label for="facebook_url" class="form-label">URL</label>
                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ $sosialMedia->get('facebook')->url ?? '' }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="facebook_aktif" name="facebook_aktif" value="1" {{ ($sosialMedia->get('facebook')->aktif ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="facebook_aktif">Aktif</label>
                </div>
            </div>
            <div class="col-md-6">
                <h5>Instagram</h5>
                <div class="mb-3">
                    <label for="instagram_url" class="form-label">URL</label>
                    <input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ $sosialMedia->get('instagram')->url ?? '' }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="instagram_aktif" name="instagram_aktif" value="1" {{ ($sosialMedia->get('instagram')->aktif ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="instagram_aktif">Aktif</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Twitter</h5>
                <div class="mb-3">
                    <label for="twitter_url" class="form-label">URL</label>
                    <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ $sosialMedia->get('twitter')->url ?? '' }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="twitter_aktif" name="twitter_aktif" value="1" {{ ($sosialMedia->get('twitter')->aktif ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="twitter_aktif">Aktif</label>
                </div>
            </div>
            <div class="col-md-6">
                <h5>LinkedIn</h5>
                <div class="mb-3">
                    <label for="linkedin_url" class="form-label">URL</label>
                    <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $sosialMedia->get('linkedin')->url ?? '' }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="linkedin_aktif" name="linkedin_aktif" value="1" {{ ($sosialMedia->get('linkedin')->aktif ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="linkedin_aktif">Aktif</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>YouTube</h5>
                <div class="mb-3">
                    <label for="youtube_url" class="form-label">URL</label>
                    <input type="url" class="form-control" id="youtube_url" name="youtube_url" value="{{ $sosialMedia->get('youtube')->url ?? '' }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="youtube_aktif" name="youtube_aktif" value="1" {{ ($sosialMedia->get('youtube')->aktif ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="youtube_aktif">Aktif</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
</div>
@endsection
