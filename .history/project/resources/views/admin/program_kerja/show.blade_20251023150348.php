@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-eye"></i> Detail Program Kerja</h3>

        <!-- Modal untuk detail -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Program Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card p-3">
                            <p><strong>ID:</strong> {{ $program->id }}</p>
                            <p><strong>Nama:</strong> {{ $program->nama }}</p>
                            <p><strong>Deskripsi:</strong> {{ $program->deskripsi ?? '-' }}</p>
                            <p><strong>Penanggung Jawab:</strong> {{ $program->penanggungJawab->nama ?? '-' }}</p>
                            <p><strong>Target Date:</strong>
                                {{ $program->target_date ? \Carbon\Carbon::parse($program->target_date)->format('d-m-Y') : '-' }}
                            </p>
                            <p><strong>Status:</strong> <span
                                    class="badge bg-info text-dark">{{ ucfirst($program->status) }}</span></p>
                        </div>

                        <hr>
                        <h5>Notulen:</h5>
                        @forelse ($program->notulen as $n)
                            <p><a href="{{ asset('storage/' . $n->file_path) }}" target="_blank">📄 Lihat Notulen</a></p>
                        @empty
                            <p>- Belum ada notulen -</p>
                        @endforelse

                        <h5>Dokumentasi:</h5>
                        @forelse ($program->dokumentasi as $d)
                            @if ($d->foto)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/uploads/dokumentasi/' . $d->foto) }}" alt="Dokumentasi"
                                        class="img-fluid" style="max-width: 300px;">
                                    <p><small>{{ $d->judul }}</small></p>
                                </div>
                            @else
                                <p>- Tidak ada gambar -</p>
                            @endif
                        @empty
                            <p>- Belum ada dokumentasi -</p>
                        @endforelse

                        <h5>Evaluasi:</h5>
                        @forelse ($program->evaluasi as $e)
                            <p><a href="{{ asset('storage/' . $e->file) }}" target="_blank">📄 Lihat File Evaluasi</a></p>
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

        <!-- Tombol untuk membuka modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">
            <i class="bi bi-eye"></i> Lihat Detail Lengkap
        </button>


        <a href="{{ route('program_kerja.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
