@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-plus-circle"></i> Tambah Evaluasi</h3>
        <form action="{{ route('admin.evaluasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="evaluasiTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                        type="button">Detail Evaluasi</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file"
                        type="button">File</button>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <!-- Detail Evaluasi -->
                <div class="tab-pane fade show active" id="detail">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Evaluasi</label>
                        <input type="text" name="id" class="form-control" value="{{ $nextId ?? 'EVAL001' }}"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label for="program_id" class="form-label">Program Kerja</label>
                        <select name="program_id" class="form-select" required>
                            <option value="">-- Pilih Program Kerja --</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Evaluasi</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Evaluasi</label>
                        <textarea name="isi" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Evaluasi</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <select name="penulis" class="form-select" required>
                            <option value="">-- Pilih Penulis --</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- File -->
                <div class="tab-pane fade" id="file">
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File (Opsional)</label>
                        <input type="file" name="file" id="file" class="form-control"
                            accept=".pdf,.doc,.docx,.jpg,.png">
                        <div class="form-text text-muted">Maksimal ukuran file 2MB.</div>
                    </div>
                </div>
            </div>

            <!-- Modal File Terlalu Besar -->
            <div class="modal fade" id="modalFileTooLarge" tabindex="-1" aria-labelledby="modalFileTooLargeLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-sm">

                        <!-- Icon & Title Section -->
                        <div class="text-center pt-4 pb-2">
                            <i class="bi bi-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                            <h5 class="mt-3 fw-semibold">Ukuran File Terlalu Besar</h5>
                        </div>

                        <!-- Body -->
                        <div class="modal-body text-center text-muted">
                            File yang Anda unggah melebihi batas maksimal <strong>2MB</strong>.<br>
                            Silakan pilih file lain dengan ukuran lebih kecil.
                        </div>

                        <!-- Footer -->
                        <div class="modal-footer border-0 justify-content-center pb-4">
                            <button type="button" class="btn btn-warning px-4 text-white"
                                data-bs-dismiss="modal">Mengerti</button>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('admin.evaluasi.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('file').addEventListener('change', function() {
                const file = this.files[0];
                if (file && file.size > 2097152) { // 2MB = 2 * 1024 * 1024 bytes
                    const modal = new bootstrap.Modal(document.getElementById('modalFileTooLarge'));
                    modal.show();
                    this.value = ''; // reset input file biar gak ke-submit
                }
            });
        });
    </script>
@endsection
