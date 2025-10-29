<x-app-layout>
    <div class="container-fluid p-4">
        <!-- Kelas Page -->
        <div class="page">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="h3 mb-4">Tambah Data Kelas</h1>

            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->nisn) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" disabled
                                value="{{ old('nisn', $siswa->nisn) }}">
                        </div>

                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis"
                                value="{{ old('nis', $siswa->nis) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" maxlength="35"
                                value="{{ old('nama', $siswa->nama) }}" required>
                        </div>

                        <select name="id_kelas" class="form-select" required>
                            <option value="" disabled
                                {{ old('id_kelas', $siswa->id_kelas ?? '') == '' ? 'selected' : '' }}>
                                Pilih Kelas
                            </option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}"
                                    {{ old('id_kelas', $siswa->id_kelas ?? '') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" maxlength="100" rows="3" required>{{ old('alamat', $siswa->alamat) }}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" maxlength="15"
                                value="{{ old('no_telp', $siswa->no_telp) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_spp" class="form-label">SPP</label>
                            <select name="id_spp" class="form-select" required>
                                <option value="" disabled
                                    {{ old('id_spp', $siswa->id_spp ?? '') == '' ? 'selected' : '' }}>Pilih SPP
                                </option>
                                @foreach ($spp as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('id_spp', $siswa->id_spp ?? '') == $item->id ? 'selected' : '' }}>
                                        {{ $item->tahun }} - Rp{{ number_format($item->nominal, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary"></input>
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Kelas Page -->
    </div>
</x-app-layout>
