@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-share"></i> Daftar Media Sosial</h3>

    <a href="{{ route('media_sosial.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Media Sosial
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Platform</th>
                        <th>URL</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mediaSosial as $ms)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ms->nama_platform }}</td>
                            <td><a href="{{ $ms->url }}" target="_blank">{{ $ms->url }}</a></td>
                            <td>
                                @if($ms->icon)
                                    <i class="bi {{ $ms->icon }}"></i> {{ $ms->icon }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($ms->aktif)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('media_sosial.show', $ms->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('media_sosial.edit', $ms->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('media_sosial.destroy', $ms->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus media sosial ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data media sosial.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
