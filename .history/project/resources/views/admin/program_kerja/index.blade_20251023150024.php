@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-list-task"></i> Daftar Program Kerja</h3>

        <a href="{{ route('program_kerja.create') }}" class="btn btn-primary mb-3">+ Tambah Program</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Penanggung Jawab</th>
                    <th>Target Date</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programKerja as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->penanggungJawab->nama ?? '-' }}</td>
                        <td><span class="badge bg-info text-dark">{{ ucfirst($p->status) }}</span></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $p->id }}">Lihat</button>
                            <a href="{{ route('program_kerja.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('program_kerja.destroy', $p->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus program ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal untuk setiap program kerja -->
        @foreach ($programKerja as $p)
            <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1"
                aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $p->id }}">Detail Program Kerja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card p-3">
                                <p><strong>ID:</strong> {{ $p->id }}</p>
                                <p><strong>Nama:</strong> {{ $p->nama }}</p>
                                <p><strong>Deskripsi:</strong> {{ $p->deskripsi ?? '-' }}</p>
                                <p><strong>Penanggung Jawab:</strong> {{ $p->penanggungJawab->nama ?? '-' }}</p>
                                <p><strong>Status:</strong> <span
                                        class="badge bg-info text-dark">{{ ucfirst($p->status) }}</span></p>
                            </div>

                            <hr>
                            <h5>Notulen:</h5>
                            @forelse ($p->notulen as $n)
                                <p><a href="{{ asset('storage/' . $n->file_path) }}" target="_blank">📄 Lihat Notulen</a>
                                </p>
                            @empty
                                <p>- Belum ada notulen -</p>
                            @endforelse

                            <h5>Dokumentasi:</h5>
                            @forelse ($p->dokumentasi as $d)
                                @if ($d->foto)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $d->foto) }}" alt="Dokumentasi" class="img-fluid"
                                            style="max-width: 100px;">
                                        <p><small>{{ $d->judul }}</small></p>
                                    </div>
                                @else
                                    <p>- Tidak ada gambar -</p>
                                @endif
                            @empty
                                <p>- Belum ada dokumentasi -</p>
                            @endforelse

                            <h5>Evaluasi:</h5>
                            @forelse ($p->evaluasi as $e)
                                <p><a href="{{ asset('storage/' . $e->file) }}" target="_blank">📄 Lihat File Evaluasi</a>
                                </p>
                            @empty
                                <p>- Belum ada evaluasi -</p>
                            @endforelse
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
