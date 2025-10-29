<x-app-layout>
    <div class="container-fluid p-4">
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
            <h1 class="h3 mb-4">Edit Data Petugas</h1>

            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $petugas->username) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Opsional)</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                        </div>

                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ old('nama_petugas', $petugas->nama_petugas) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="admin" {{ old('level', $petugas->level) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="petugas" {{ old('level', $petugas->level) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>