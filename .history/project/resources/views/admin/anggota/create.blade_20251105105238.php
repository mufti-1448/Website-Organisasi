@extends('admin.layouts.app')

@section('title', 'Tambah Anggota')

@section('content')

    <style>
        .modal-content {
            border-radius: 12px;
        }

        .btn-warning.text-white {
            background-color: #f1b44c !important;
            border: none;
        }

        .btn-warning.text-white:hover {
            background-color: #e0a53e !important;
        }

        .form-text {
            font-size: 0.875rem;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tambah Anggota</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.anggota.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">ID Anggota</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $nextCode }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Alamat Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                        name="kontak" value="{{ old('kontak') }}" required>
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas"
                        required>
                        <option value="">Pilih Kelas</option>
                        <option value="X PPLG 1" {{ old('kelas') == 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1</option>
                        <option value="X PPLG 2" {{ old('kelas') == 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2</option>
                        <option value="XI PPLG 1" {{ old('kelas') == 'XI PPLG 1' ? 'selected' : '' }}>XI PPLG 1</option>
                        <option value="XI PPLG 2" {{ old('kelas') == 'XI PPLG 2' ? 'selected' : '' }}>XI PPLG 2</option>
                        <option value="XII PPLG 1" {{ old('kelas') == 'XII PPLG 1' ? 'selected' : '' }}>XII PPLG 1</option>
                        <option value="XII PPLG 2" {{ old('kelas') == 'XII PPLG 2' ? 'selected' : '' }}>XII PPLG 2</option>
                    </select>
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"
                        required>
                        <option value="">Pilih Jabatan</option>
                        <option value="Ketua" {{ old('jabatan') == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="Wakil Ketua" {{ old('jabatan') == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua
                        </option>
                        <option value="Sekretaris" {{ old('jabatan') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris
                        </option>
                        <option value="Bendahara" {{ old('jabatan') == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                        <option value="Koordinator" {{ old('jabatan') == 'Koordinator' ? 'selected' : '' }}>Koordinator
                        </option>
                        <option value="Anggota" {{ old('jabatan') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Alamat Lengkap</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        name="foto" accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-muted">Upload foto anggota (opsional). Maksimal ukuran file 2MB.</div>
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
                <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('foto').addEventListener('change', function() {
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
