@extends('admin.layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tambah Anggota</h1>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                        name="kontak" value="{{ old('kontak') }}" required>
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Alamat Eamil</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
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
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        name="foto" accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Upload foto anggota (opsional). Maksimal ukuran file 2MB.</div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('foto').addEventListener('change', function(e) {
            if (this.files[0] && this.files[0].size > 2097152) { // 2MB
                alert('File terlalu besar. Maksimal ukuran file 2MB.');
                this.value = '';
            }
        });
    </script>
@endsection
