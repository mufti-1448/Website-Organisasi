<x-app-layout>
    <div class="container-fluid p-4">
        <!-- Kelas Page -->
            <div class="page">
                <h1 class="h3 mb-4">Tambah Data Kelas</h1>

                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_kelas" class="form-label">ID Kelas</label>
                                <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="{{ old('id_kelas', $kelas->id_kelas) }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas' ,$kelas->nama_kelas) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                                <select class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" required>
                                    <option value="">-- Pilih Kompetensi --</option>
                                    @foreach ($kompetensiList as $k)
                                        <option value="{{ $k }}" {{ (old('kompetensi_keahlian', $kelas->kompetensi_keahlian) == $k) ? 'selected' : '' }}> {{ $k }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary"></input>
                            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End of Kelas Page -->
    </div>
</x-app-layout>
