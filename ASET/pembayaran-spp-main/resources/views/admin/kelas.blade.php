<x-app-layout>
    <div class="container-fluid p-4">
        <!-- Kelas Page -->
        <div class="page">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
                    <a href="{{ route('kelas.tambah') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Kelas
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($kelas as $k)
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td>{{ $k->id_kelas }}</td>
                                        <td>{{ $k->nama_kelas }}</td>
                                        <td>{{ $k->kompetensi_keahlian }}</td>
                                        <td>
                                            <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-info btn-sm me-1"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('kelas.hapus', $k->id_kelas) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Kelas Page -->
    </div>
</x-app-layout>
