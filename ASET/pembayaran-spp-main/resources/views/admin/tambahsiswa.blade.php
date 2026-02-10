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
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>

                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" maxlength="35"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="id_kelas" class="form-label">Kelas</label>
                            <select class="form-select" id="id_kelas" name="id_kelas" required>
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" maxlength="100" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" maxlength="15"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="id_spp" class="form-label">SPP</label>
                            <select class="form-select" id="id_spp" name="id_spp" required>
                                <option value="" disabled selected>Pilih SPP</option>
                                @foreach ($spp as $s)
                                    <option value="{{ $s->id }}">{{ $s->tahun }} -
                                        Rp{{ number_format($s->nominal, 0, ',', '.') }}</option>
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
