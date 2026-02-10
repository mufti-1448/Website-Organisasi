@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Dokumentasi</h3>

        <form action="{{ route('admin.dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">ID Dokumentasi</label>
                <input type="text" name="id" class="form-control" value="{{ $dokumentasi->id }}" readonly>
                <small class="form-text text-muted">ID tidak dapat diubah.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $dokumentasi->judul) }}"
                    class="form-control @error('judul') is-invalid @enderror" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $dokumentasi->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $dokumentasi->tanggal) }}"
                    class="form-control @error('tanggal') is-invalid @enderror" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Rapat" {{ old('kategori', $dokumentasi->kategori) == 'Rapat' ? 'selected' : '' }}>Rapat
                    </option>
                    <option value="Program Kerja"
                        {{ old('kategori', $dokumentasi->kategori) == 'Program Kerja' ? 'selected' : '' }}>Program Kerja
                    </option>
                    <option value="Lainnya" {{ old('kategori', $dokumentasi->kategori) == 'Lainnya' ? 'selected' : '' }}>
                        Lainnya</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Foto Baru (Opsional)</label>
                @if ($dokumentasi->foto)
                    <p>Foto saat ini: <img src="{{ asset('storage/' . $dokumentasi->foto) }}" alt="Foto Dokumentasi"
                            style="max-width: 200px;" class="img-thumbnail"></p>
                @endif
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                    accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto. Maksimal ukuran file
                    2MB.</small>
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

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Update</button>
            <a href="{{ route('admin.dokumentasi.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('input[name="foto"]').addEventListener('change', function() {
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
